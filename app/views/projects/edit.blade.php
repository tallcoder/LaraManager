@extends('layouts.default')
@section('content')
<h3>Edit {{ $project->name }}</h3>
{{ Form::open(array('route' => "projects.update", 'id' => 'edit_project', 'method' => 'put')) }}
{{ Form::label('name', 'Name:') }}
{{ Form::text('name', $project->name) }}
{{ Form::label('budget', 'Budget:') }}
$<input type="number" name="budget" id="budget" min="0" max="50000" step="10" value="{{ $project->budget_total }}" /><br />
{{ Form::label('description', 'Description:') }}
{{ Form::textarea('description', $project->description) }}
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop