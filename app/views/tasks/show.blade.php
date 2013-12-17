@extends('layouts.default')
@section('content')
	<h2>{{ $task->name }}</h2>
	<p>{{ $task->description }}</p>

@stop
