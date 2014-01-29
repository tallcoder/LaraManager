@extends('layouts.default')
@section('content')
	<h2>User Options</h2>
	<p>Use this page to set up any user options, change your email address, etc</p>

<div class="ajax-group">
	<label for="email">Email</label>
	<input type="email" name="email" id="email" value="{{ $user->email }}">
	<button>Save</button>
</div>

<div class="ajax-group">
	<label for="notifyme">Notify Me</label>
	<select name="notify" id="notify">
		<option value="none">Never</option>
		<option value="assigned">My Projects &amp; Tasks</option>
		<option value="all">All</option>
	</select>
	<button>Save</button>
</div>

<div class="ajax-group">
	<label for="frequency">Notification Frequency</label>
	<select name="frequency" id="frequency">
		<option value="0">Instantly</option>
		<option value="2">Every 2 Hours</option>
		<option value="12">Every 12 Hours</option>
		<option value="24">Daily</option>
	</select>
	<button>Save</button>
</div>
@stop