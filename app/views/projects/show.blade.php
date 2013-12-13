@extends('layouts.default')
{{--
available vars:
 --user:object
 --project:object
 --title:string
--}}
@section('content')
	<h3>Project Overview</h3>
	<table id="project">
		<tr>
			<th>Project Name</th>
			<th>Budget</th>
			<th>Completed?</th>
			<th>Dev Site</th>
		</tr>
	@include('layouts.partials._form_project')
	</table>
	{{ HTML::linkRoute('projects.tasks.create', 'Create Task', $project->id) }}
	{{ HTML::linkRoute('projects.lists.create', 'Create Task List', $project->id) }}
@stop