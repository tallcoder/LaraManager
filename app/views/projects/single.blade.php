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
	{{ Form::open(array('route' => 'comment.store', 'method' => 'post')) }}
		<h4>Add comment</h4>
		@include('layouts.partials._form_show_comments')
		@include('layouts.partials._form_comment')
	{{ Form::submit() }}
	{{ Form::close() }}
@stop