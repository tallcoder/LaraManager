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
    {{ Form::file('file1') }}
    {{ Form::label('perm1' ,'Who can view this?') }}
    All{{ Form::radio('perm1', 'all') }}
    Staff{{ Form::radio('perm1', 'staff') }}
    Admin{{ Form::radio('perm1', 'admin') }}<br />
    {{ Form::file('file2') }}
    {{ Form::label('perm2' ,'Who can view this?') }}
    All{{ Form::radio('perm2', 'all') }}
    Staff{{ Form::radio('perm2', 'staff') }}
    Admin{{ Form::radio('perm2', 'admin') }}<br />
    {{ Form::file('file3') }}
    {{ Form::label('perm3' ,'Who can view this?') }}
    All{{ Form::radio('perm3', 'all') }}
    Staff{{ Form::radio('perm3', 'staff') }}
    Admin{{ Form::radio('perm3', 'admin') }}
    <br />
    {{ Form::submit() }}
    {{ Form::close() }}
@stop