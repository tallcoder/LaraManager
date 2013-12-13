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
	@include('layouts.partials._form_project')
	</table>
@stop