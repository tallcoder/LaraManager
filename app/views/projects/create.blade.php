@extends('layouts.default')
@section('content')
{{ Form::open(array('route' => 'Projects.store')) }}
<label for="name">Project Name:</label><input type="text" id="name" name="name" maxlength="60" />
<label for="client_name">Client Name:</label><input type="text" id="client_name" name="client_name" maxlength="60" />
<label for="budget">Budget:</label><input type="number" id="budget" name="budget" />
<label for="description">Description:</label><textarea id="description" name="description"></textarea>
{{ Form::submit() }}

{{ Form::close() }}
@stop
