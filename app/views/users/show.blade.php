@extends('layouts.default')
@section('content')
    <div class="left">
        <h3>Your information:</h3>
        <p>Username: <i>{{ $me->username }}</i></p>
        <p>First Name: <i>{{ $me->first_name }}</i></p>
        <p>Last Name: <i>{{ $me->last_name }}</i></p>
        <p>Email: <i>{{ $me->email }}</i></p>
        <p>Phone: <i>{{ $me->phone }}</i></p>
        <p>Account Expires: <i>{{ $me->expires }}</i></p>
    </div>
    <div class="right">
        <h3>Your Projects:</h3>
        @foreach($projects as $project)
        <p>{{ HTML::linkRoute('projects.show' , $project->name, array($project->id)) }}</p> <br />
        @endforeach
    </div>
@stop
