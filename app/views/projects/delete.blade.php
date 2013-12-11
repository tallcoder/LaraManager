@extends('layouts.default')
@section('content')
<h3>Please select a project to delete:</h3>
{{ Form::open(array('route' => 'Projects.destroy')) }}
<select id="projects">
@foreach($projects as $project)
	<option value="{{ $project->id }}">{{ $project->name }}</option>
@endforeach
@stop