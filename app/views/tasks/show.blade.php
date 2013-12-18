@extends('layouts.default')
@section('content')
	<h2>{{ $task->name }}</h2>
	<h4>Summary:</h4><p>{{ $task->description }}</p>
    <h4>Budget: <p>${{ $task->budget_total }}</p></h4>
    <h4>Due Date: <p>{{ $task->due_date }}</p></h4>
    <h4>Project: <p>{{ HTML::linkRoute('projects.show', $task->project->name, array($task->project->id)) }}</p></h4>
    <h4>Task List: </h4><p>{{ HTML::linkRoute('projects.tasklists.show', $task->tasklist->name, array($task->tasklist->parent_id, $task->tasklist->id)) }}</p>
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
    {{ Form::hidden('user', $user->id) }}
    {{ Form::hidden('type', 't_comment') }}
    <br />{{ Form::submit() }}
    {{ Form::close() }}
    </div>
    <div class="right">
        <h4>Mark Completed</h4>
        <h4>{{ HTML::linkRoute('projects.tasks.edit', 'Start/Edit Task', array($task->project->id, $task->id)) }}</h4>
        <h4>Delete Task</h4>
    </div>
@stop
