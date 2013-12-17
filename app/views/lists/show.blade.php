@extends('layouts.default')
@section('content')
	<h2>{{ $list->name }}</h2>
	<p>Project: <i>{{ $project->name }}</i></p>
	<h3>Tasks In This List</h3>

	@foreach($tasks as $t)
		<h4>{{ $t->name }}</h4>
		<p>Created by: <i>{{ User::find($t->created_by)->first_name}} {{ User::find($t->created_by)->last_name }}</i></p>

		@if($t->assigned_to)
			<p>Assigned to: <i>{{ User::find($t->assigned_to)->first_name}} {{ User::find($t->assigned_to)->last_name }}</i></p>
		@else
			<p>Unassigned</p>
		@endif

		@if($t->due_date)
			<p>Due Date: {{ $t->due_date }}</p>
		@else
			<p>No due date.</p>
		@endif

		<p>{{ $t->description }}</p>
		{{ HTML::linkRoute('projects.tasks.show', 'View', array($project->id, $t->id)) }}
		{{ HTML::linkRoute('projects.tasks.edit', 'Edit', array($project->id, $t->id)) }}
	@endforeach
@stop