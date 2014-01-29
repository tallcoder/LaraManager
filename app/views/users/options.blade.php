@extends('layouts.default')
@section('content')
	<h2>User Options</h2>
	<p>Use this page to set up any user options, change your email address, etc</p>
{{ Form::open(array('route' => array('users.options.save', $user->id))) }}
<div class="ajax-group">
	<label for="email">Email</label>
	<input type="email" name="email" id="email" value="{{ $user->email }}">
</div>

<div class="ajax-group">
	<label for="notify">Notify Me</label>
	<select name="notify" id="notify">
		<option value="none">Never</option>
		<option value="assigned">My Projects &amp; Tasks</option>
		<option value="all">All</option>
	</select>
</div>

<div class="ajax-group">
	<label for="frequency">Notification Frequency</label>
	<select name="frequency" id="frequency">
		<option value="0">Instantly</option>
		<option value="2">Every 2 Hours</option>
		<option value="12">Every 12 Hours</option>
		<option value="24">Daily</option>
	</select>
</div>
{{ Form::submit('Save') }}
{{ Form::close() }}
@stop