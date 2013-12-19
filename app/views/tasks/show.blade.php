@extends('layouts.default')
@section('content')
	<h2>{{ $task->name }}</h2>
	<h4>Summary:</h4><p>{{ $task->description }}</p>
    <h4>Budget: <p>${{ $task->budget_total }}</p></h4>
    <h4>Due Date: <p>{{ $task->due_date }}</p></h4>
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
    <h4>Time Used:</h4><p>{{ $task->time }}</p>
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
    {{ Form::hidden('parent', $task->id) }}
    {{ Form::hidden('user', $me->id) }}
    {{ Form::hidden('type', 't_comment') }}
    <br />{{ Form::submit() }}
    {{ Form::close() }}
    </div>
    <div class="right">
        @if(!$task->completed)
        <h4> {{ Form::open(array('url' => 'projects/' . $task->project->id . '/tasks/' . $task->id, 'method' => 'PUT')) }}
        {{ Form::submit('Mark Completed') }}
        {{ Form::hidden('iscompleted', '1') }}
        {{ Form::hidden('task', $task->id) }}
        {{ Form::hidden('user', Auth::user()->id) }}
        {{ Form::close() }}
        </h4>
        <br />
        @endif
        <h4>{{ HTML::link(Request::url() . '/edit', 'Start/Edit Task') }}</h4>
        {{ Form::open(array('url' => 'projects/' . $task->project->id . '/tasks/' . $task->id, 'method' => 'DELETE')) }}
        {{ Form::submit('Delete Task') }}
        {{ Form::hidden('isdeleted', '1') }}
        {{ Form::hidden('task', $task->id) }}
        {{ Form::hidden('user', Auth::user()->id) }}
        {{ Form::close() }}
    </div>
@stop
