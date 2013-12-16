@extends('layouts.default')
@section('content')
	{{ $user->username }}
	@foreach($projects as $project)
	{{ $project->name }} <br />
	@endforeach
@stop
