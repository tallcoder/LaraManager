@extends('layouts.default')
@section('content')
    <div class="left">
        <h3>Your information:</h3>
        <p>Username: <i>{{ $user->username }}</i></p>
        <p>First Name: <i>{{ $user->first_name }}</i></p>
        <p>Last Name: <i>{{ $user->last_name }}</i></p>
        <p>Email: <i>{{ $user->email }}</i></p>
        <p>Phone: <i>{{ $user->phone }}</i></p>
        <p>Account Expires: <i>{{ $user->expires }}</i></p>
	      {{ HTML::linkRoute('users.options', 'Options', $user->id) }}
    </div>
    <div class="right">
        <h3>Your Projects:</h3>
        @foreach($projects as $project)
        <p>{{ HTML::linkRoute('projects.show' , $project->name, array($project->id)) }}</p> <br />
        @endforeach
    </div>
@stop
