@extends('layouts.default')
@section('content')
    <h3>{{ $task->name }}</h3>
    <h4>Project: <p>{{ $task->project->name }}</p></h4>
    @if($task->tasklist)
    <h4>Task List: <p>{{ $task->tasklist->name }}</p></h4>
    @else
    <h4>No Task List</h4>
    @endif
    {{ Form::open(array('url' => 'projects/' . $task->project->id . '/tasks/' . $task->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

    {{ Form::hidden('user', Auth::user()->id) }}
    {{ Form::hidden('task', $task->id) }}
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', $task->name) }}<br />
    {{ Form::label('description', 'Description:') }}<br />
    {{ Form::textarea('description', $task->description) }}<br />
    {{ Form::label('budget_total', 'Budget:') }}
    <input type="number" name="budget_total" value="{{ $task->budget_total }}" min="0" /><br />
    <a href="javascript:void" name="timer" id="start">Start Task</a>
    {{ Form::text('start_time') }}
    <a href="javascript:void" name="timer" id="stop">Stop Task</a>
    {{ Form::text('stop_time') }}
    <br/>
    <h4>Time Used:</h4><p>{{ $task->time }}</p>
    <br />
    {{ Form::label('time', 'Add Time to Task:') }}
    {{ Form::text('time', 0) }}
    <br />
    {{ Form::label('completed', 'Completed?') }}
    <input type="checkbox" name="completed" id="completed"
    @if($task->completed)
    checked
    @endif
    /><br />
    @include('layouts.partials._form_file_upload')
    <br />
    {{ Form::submit() }}
    {{ Form::close() }}
@stop