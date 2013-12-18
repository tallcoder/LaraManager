@extends('layouts.default')
@section('content')
    <h2>Task List Overview</h2>
    @foreach($lists as $l)
        <h4>{{ HTML::linkRoute('projects.tasklists.show', $l->name, array($l->project->id, $l->id)) }}</h4>
        <h4>Project:</h4><p>{{ HTML::linkRoute('projects.show', $l->project->name, array($l->project->id)) }}</p>
        <h4>Description:</h4><p>{{ $l->description }}</p>
    @endforeach
@stop