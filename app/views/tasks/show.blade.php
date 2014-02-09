@extends('layouts.default')
@section('content')
	<h2>{{ $task->name }}</h2>
	<h4>Summary:</h4><p>{{ $task->description }}</p>
    <h4>Budget: <p>${{ $task->budget_total }}</p></h4>
    <h4>Due Date: <p>{{ getMdy($task->due_date) }}</p></h4>
    <h4>Project: <p>{{ HTML::linkRoute('projects.show', $task->project->name, array($task->project->id)) }}</p></h4>
    @if($task->tasklist)
    <h4>Task List: </h4><p>{{ HTML::linkRoute('projects.tasklists.show', $task->tasklist->name, array($task->tasklist->parent_id, $task->tasklist->id)) }}</p>
    @else
    <h4>No Task List</h4>
    @endif
    @if($task->completed)
    <h4>Task Completed</h4>
    @else
    <h4>Task <i>Not</i> Completed</h4>
    @endif
    <h4>Task Type:</h4><p>{{ $task->type }}</p>
    <h4>Time Used:</h4><p>{{ $task->time }} minute</p>
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
    <div class="left">
    <div id="comments">
        <h3>Comments</h3>
        @if($comments)
        @include('layouts.partials._form_show_comments')
        @endif
    </div>
    <br />
    {{ Form::open(array('route' => 'comments.store')) }}
    <h4>Add comment</h4>
    {{ Form::textarea('comment') }}
    @if($me->usertype == 'admin' || $me->usertype == 'staff')
	    <br />
    {{ Form::label('staffonly', 'Staff Only?') }}
    {{ Form::checkbox('staffonly', 'true') }}
    @endif
    {{ Form::hidden('parent', $task->id) }}
    {{ Form::hidden('user', $me->id) }}
    {{ Form::hidden('type', 't_comment') }}
    <br />{{ Form::submit() }}
    {{ Form::close() }}
    </div>
    <div class="right">
        @if(!$task->completed)
       <form id="complete" action="/tasks/complete/{{ $task->id }}" method="post">
	       <button type="submit">Mark Completed</button>
       </form>
        <br />
        @endif
        <a href="{{ Request::url() . '/edit' }}"><button>Start/Edit Task</button></a>
        <form id="deleteTask" action="/t/delete/{{ $task->id }}" method="post">
	        <button id="btnDelete" type="submit">Delete</button>
        </form>
	      <form id="subscribe" action="/subscribe/task/{{ $project->id }}" method="post">
		      <button type="submit">Subscribe</button>
	      </form>
    </div>
@stop
