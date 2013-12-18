@extends('layouts.default')
@section('content')
    <h3>{{ $task->name }}</h3>
    <h4>Project: <p>{{ $task->project->name }}</p></h4>
    <h4>Task List: <p>{{ $task->tasklist->name }}</p></h4>
    {{ Form::open(array('route' => array('projects.tasks.update', $task->project->id, $task->id), 'enctype' => 'multipart/form-data')) }}

    {{ Form::hidden('user', Auth::user()->id) }}

    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', $task->name) }}<br />
    {{ Form::label('description', 'Description:') }}<br />
    {{ Form::textarea('description', $task->description) }}<br />
    {{ Form::label('budget_total', 'Budget:') }}
    <input type="number" name="budget_total" value="{{ $task->budget_total }}" step="10" min="0" /><br />
    <a href="javascript:void" name="timer" id="start">Start Task</a>
    {{ Form::text('start_time') }}
    <a href="javascript:void" name="timer" id="stop">Stop Task</a>
    {{ Form::text('stop_time') }}
    <br />
    {{ Form::label('time', 'Time on Task:') }}
    {{ Form::text('time', $task->time) }}
    <br />
    {{ Form::label('completed', 'Completed?') }}
    {{ Form::checkbox('completed') }}<br />
    {{ Form::file('file1') }}<br />
    {{ Form::file('file2') }}<br />
    {{ Form::file('file2') }}
    <br />
    {{ Form::submit() }}
    {{ Form::close() }}
@stop