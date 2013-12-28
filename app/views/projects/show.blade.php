@extends('layouts.default')
@section('content')
	<div class="actions">
        @if($me->usertype != 'client')
		<a href="{{ $project->id }}/tasks/create"><button>Create Task</button></a>
		<a href="{{ $project->id }}/tasklists/create"><button>Create Task List</button></a>
		{{ Form::open(array('route'=>'home', $project->id)) }}
						<button type="submit">Mark Completed</button>
						{{ Form::close() }}
						{{ Form::open(array('url' => 'projects/' . $project->id, 'method' => 'DELETE')) }}
		<button class="deleter" type="submit">Delete Project</button>
						{{ Form::close() }}
        @endif
      <a href="/edit"><button>Edit Project</button></a>
	</div>
    @if($uploads)
    <div class="uploads">
        <h4>Attachments</h4>
        @foreach($uploads as $u)
        @if($u->type == 'png' || $u->type =='jpg' || $u->type == 'gif')
        {{ HTML::image('/uploads/' . $u->name, $u->name, array('class' => 'preview attachment')) }}
        @else
        {{ HTML::linkAsset('/uploads/' . $u->name, $u->name, array('class' => 'attachment')) }}
        @endif
        @endforeach
    </div>
    @endif
	<div class="overview">
		<h3>Project Overview</h3>
		<h4>Project:</h4><p>{{ $project->name }}</p><br/>
		<h4>Client:</h4><p>{{ User::find($project->user_id)->first_name}} {{User::find($project->user_id)->last_name }}</p>
        <br/>
		<h4>Total Budget:</h4><p>${{ $project->budget_total }}</p><br/>
		<h4>Used Budget:</h4><p>${{ $project->budget_used }}</p><br/>
		<h4>Start Date:</h4><p>{{ getMdy($project->begin_date) }}</p><br/>
		<h4>Due Date:</h4><p>{{ getMdy($project->due_date) }}</p><br/>
		<h4>Finished Date:</h4><p>{{ getMdy($project->end_date) }}</p><br/>
		@if($project->completed == 1)
		<h4>Project Completed</h4><br/>
		@else
		<h4>Project Not Completed</h4><br/>
		@endif
		@if($project->staffonly)
		<h4>Staff Project</h4><br/>
		@endif
		<h4>Summary:</h4><p>{{$project->description }}</p>
		<h4>Dev Link:</h4><p>{{ HTML::link($project->url, 'Click Here') }}</p>
	</div>

    <div class="left">
        <div id="comments">
            <h3>Comments</h3>
        @if($comments)
            @include('layouts.partials._form_show_comments')
        @endif
        </div>
        <div class="clear"></div>
        {{ Form::open(array('route' => array('comments.store'), 'id'=>'add_comment')) }}
        <h4>Add comment</h4>
        {{ Form::textarea('comment') }}
	      @if($me->usertype == 'admin' || $me->usertype == 'staff')
	      <br />
	      {{ Form::label('staffonly', 'Staff Only?') }}
	      {{ Form::checkbox('staffonly', 'true') }}
	      @endif
        {{ Form::hidden('parent', $project->id) }}
        {{ Form::hidden('user', $me->id) }}
        {{ Form::hidden('type', 'p_comment') }}
        <br />{{ Form::submit() }}
        {{ Form::close() }}
    </div>
    <div class="right">
        <div id="tasklists">
            <h3>Task Lists</h3>
                @foreach($lists as $l)
                <p>{{ HTML::linkRoute('projects.tasklists.show', $l->name, array($project->id, $l->id)) }}</p>
                @endforeach
        </div>
        <div id="tasks">
            <h3>Current Tasks</h3>
            @foreach($tasks as $t)
                @if($me->usertype != 'client')
               <h4>{{ HTML::linkRoute('projects.tasks.show', $t->name, array($project->id, $t->id)) }}</h4>
                @else
                <h4>{{ $t->name }}</h4>
                @endif
                @if($t->due_date)
                    <p>Due Date: <i>{{ getMdy($t->due_date) }}</i></p>
                @else
                    <p>No Due Date</p>
                @endif
            @endforeach
        </div>
    </div>

@stop