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
    $<input type="number" name="budget_total" value="{{ $task->budget_total }}" min="0" /><br />
		<h4>Time Used: {{ $task->time }} minutes</h4>
		<br />
    <button type="button" class="timer-btn">Start Task</button>
    {{ Form::text('start_time') }}<br />
    <button type="button" class="timer-btn">Stop Task</button>
    {{ Form::text('stop_time') }}
    <br/>

    {{ Form::label('time', 'Add Time to Task:') }}
    {{ Form::text('time', 0) }}
    <br />
    {{ Form::label('completed', 'Completed?') }}
    <input type="checkbox" name="completed" id="completed"
    @if($task->completed)
    checked
    @endif
    /><br />
		@if($me->usertype == 'admin' || $me->usertype == 'staff')
		<br />
		{{ Form::label('staffonly', 'Staff Only?') }}
		{{ Form::checkbox('staffonly', 'true', $task->staffonly) }}<br />
		@endif
    @include('layouts.partials._form_file_upload')
    <br />
    {{ Form::submit() }}
    {{ Form::close() }}
@stop