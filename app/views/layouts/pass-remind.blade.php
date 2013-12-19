@extends('layouts.default')
@section('content')
	<h2>Send Password Reminder</h2>
	<form action="{{ action('RemindersController@postRemind') }}" method="POST">
		{{ Form::label('email', 'Enter Your Email:') }}
		{{ Form::email('email') }}<br />
		{{ Form::submit('Send Reminder') }}
	</form>
@stop