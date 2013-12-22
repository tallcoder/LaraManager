@extends('layouts.default')
@section('content')
	<h2>Create Tasklist</h2>
	{{ Form::open(array('route' => 'projects.tasklists.store')) }}
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}
    <br />
    {{ Form::label('project', 'Project:') }}
    <select name="parent">
        <option value="0">---</option>
        @foreach($projects as $p)
        <option value="{{ $p->id }}">{{ $p->name }}</option>
        @endforeach
    </select>
		@if($me->usertype == 'admin' || $me->usertype == 'staff')
		<br />
		{{ Form::label('staffonly', 'Staff Only?') }}
		{{ Form::checkbox('staffonly', 'true') }}
		@endif
    <br />
    {{ Form::label('description', 'Description:') }}
    <br />
    {{ Form::textarea('description') }}
    <br />
    {{ Form::submit('Create') }}
    {{ Form::close() }}
@stop