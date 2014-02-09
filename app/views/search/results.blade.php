@extends('layouts.default')
@section('content')
	<h1>Search Results</h1>
	<p>Your search for "{{ $query }}" yielded the following results:</p>
	<h3>Projects:</h3>
	<ol class="results">
	@foreach($projects as $p)
		<li>
		{{$n++}}.<a href="/projects/{{ $p->id }}">{{ $p->name }}</a> - {{ $p->description }}
		</li>
	@endforeach
	</ol>
	<h3>Tasks:</h3>
	<ol class="results">
	@foreach($tasks as $t)
		<li>
			{{$n++}}.<a href="/projects/{{$t->project->id}}/tasks/{{$t->id}}">{{ $t->name }}</a> - {{ $t->description }}
		</li>
	@endforeach
	</ol>
	<h3>Task Lists:</h3>
	<ol class="results">
		@foreach($lists as $l)
		<li>
			{{$n++}}.<a href="/projects/{{$l->project->id}}/tasklists/{{$l->id}}">{{ $l->name }}</a> - {{ $l->description }}
		</li>
		@endforeach
	</ol>
@stop