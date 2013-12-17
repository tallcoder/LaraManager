@extends('layouts.default')
@section('content')
	<div class="actions">
		{{ HTML::linkRoute('projects.tasks.create', 'Create Task', $project->id) }}
		{{ HTML::linkRoute('projects.tasklists.create', 'Create Task List', $project->id) }}
		{{--{{ Form::open(array('route'=>'projects.complete', $project->id)) }}
						{{ Form::submit('Mark Completed') }}
						{{ Form::close() }}--}}
		{{ HTML::linkRoute('projects.destroy', 'Delete Project', $project->id) }}
	</div>
	<div class="overview">
		<h3>Project Overview</h3>
		<h4>Project: {{ $project->name }}</h4>
		<h4>Client: {{ User::find($project->user_id)->first_name}} {{User::find($project->user_id)->last_name }}</h4>
		<h4>Total Budget: ${{ $project->budget_total }}</h4>
		<h4>Used Budget: ${{ $project->budget_used }}</h4>
		<h4>Start Date: {{ $project->begin_date }}</h4>
		<h4>Due Date: {{ $project->due_date }}</h4>
		<h4>Finished Date: {{ $project->end_date }}</h4>
		@if($project->completed == 1)
		<h4>Project Completed</h4>
		@else
		<h4>Project Not Completed</h4>
		@endif
		<h4>Summary:</h4>
		<p>{{$project->description }}</p>
		<p>Dev Link: {{ HTML::link($project->url, 'Click Here') }}</p>
	</div>

	<div id="comments">
		<h3>Comments</h3>
	@if($comments)
		@include('layouts.partials._form_show_comments')
	@endif
	</div>
	<div id="tasklists">
		<h3>Task Lists</h3>
			@foreach($lists as $l)
			<p>{{ HTML::linkRoute('projects.tasklists.show', $l->name, array($project->id, $l->id)) }}</p>
			@endforeach
	</div>
	{{ Form::open(array('route' => 'comments.store')) }}
		<h4>Add comment</h4>
		@include('layouts.partials._form_comment')
	<br />{{ Form::submit() }}
	{{ Form::close() }}
@stop