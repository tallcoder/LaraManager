@extends('layouts.default')

@section('content')
{{ Form::open(array('route' => 'projects.store', 'id' => 'create_project')) }}
{{ Form::label('name', 'Name:') }}
{{ Form::text('name') }}<br />
{{ Form::label('client_name', 'Client Name:') }}
{{ Form::text('client_name') }}<br />
{{ Form::label('budget', 'Budget:') }}
$<input type="number" name="budget" id="budget" min="0" max="50000" step="10" value="0" /><br />
{{ Form::label('description', 'Description:') }}<br />
{{ Form::textarea('description') }}<br />
{{ Form::submit() }}
{{ Form::close() }}

@stop
