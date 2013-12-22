@extends('layouts.default')
@section('content')
<h3>Edit {{ $project->name }}</h3>
{{ Form::open(array('url' => 'projects/' . $project->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}
@if($me->usertype == 'staff' || $me->usertype == 'admin')
<div class="left">
	{{ Form::hidden('id', $project->id) }}
    {{ Form::hidden('full', true) }}
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name', $project->name) }}<br/>
	{{ Form::label('budget', 'Budget:') }}
	$<input type="number" name="budget" id="budget" min="0" max="50000" value="{{ $project->budget_total }}" /><br />
	{{ Form::label('user', 'Client:') }}
	<select name="user">
		<option value="{{ $project->user->id }}" selected>{{ $project->user->first_name . " " . $project->user->last_name
		                                                  }}</option>
		@foreach($users as $u)
			@if($u->id != $project->user->id)
			<option value="{{ $u->id }}">{{ $u->first_name . " " .$u->last_name }}</option>
			@endif
		@endforeach
	</select>
	@if($me->usertype == 'admin' || $me->usertype == 'staff')
	<br />
	{{ Form::label('staffonly', 'Staff Only?') }}
	{{ Form::checkbox('staffonly', 'true', $project->staffonly) }}
	@endif
	<br/>
	{{ Form::label('description', 'Description:') }}<br />
	{{ Form::textarea('description', $project->description) }}<br />
<h4><i>Leave blank if you do not wish to change these values!</i></h4>
	{{ Form::label('begin_date', 'Begin Date:') }}
	<input type="date" name="begin_date" id="begin_date" />
	<br/>
	{{ Form::label('due_date', 'Due Date:') }}
	<input type="date" name="due_date" id="due_date" />
	<br />
	{{ Form::label('url', 'Dev Link:') }}
	<input type="text" name="url" id="url" value="{{ $project->url }}" size="40" />
	<br/>
</div>
@endif
<div class="right">
	<h3>Upload Attachments</h3>
    @if($me->usertype == 'client')
    {{ Form::open(array('url' => 'projects/' . $project->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}
    {{ Form::hidden('user', $me->id) }}
    @endif
	@include('layouts.partials._form_file_upload')
    @if($me->usertype == 'client')
    {{ Form::submit('Upload') }}
    {{ Form::close() }}
    @endif
</div>
<br />
<div class="clear"></div>
    @if($me->usertype != 'client')
	{{ Form::submit('Save') }}
	{{ Form::close() }}
    @endif
@stop