@extends('layouts.default')
@section('content')
	<h3>Project Overview</h3>
	<table id="project">
		<tr>
			<th>Project Name</th>
			<th>Budget</th>
			<th>Completed?</th>
			<th>Dev Site</th>
		</tr>
		<tr>
			<td>{{ $projects->name }}</td>
			<td>{{ $projects->budget_total }}</td>
			<td>{{ $projects->completed }}</td>
			<td><a href="{{ $projects->url }}">Link</a></td>
		</tr>
		<tr>
			<td>{{ $projects->description }}</td>
		</tr>
	</table>
@stop