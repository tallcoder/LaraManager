@extends('layouts.default')
@section('content')
@if($me)
    @if($me->usertype != 'client')
    <h2>LaraManager</h2>
    <p>Welcome to LaraManager!</p>
    <p>Hello {{$me->first_name }}! Check out the "Projects Overview" to see all projects, or you can create a new one and add tasks, lists, and attachments!</p>
    @endif
    @if($me->usertype == 'client')
    <h2>LaraManager</h2>
    <p>Hello {{$me->first_name }}! Check out "My Overview" to see your current project(s) and add comments, attachments, and interact with the team!</p>
    @endif
@else
<h2>LaraManager Login</h2>
{{ Form::open(array('route' => 'sessions.store', 'id' => 'login')) }}
	<div class="input-group">
			{{ Form::label('username', 'Username:', '', array('class' => 'form-control')) }}
			{{ Form::text('username', '', array('class' => 'form-control')) }}
	</div>
	<div class="input-group">
			{{ Form::label('password', 'Password:', '', array('class' => 'form-control')) }}
			{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
			<button type="submit" class="btn-primary btn-login">Login</button>
{{ Form::close() }}

<h4>{{ HTML::linkRoute('forgotpassword', 'Forgot Password?') }}</h4>
@endunless
@stop