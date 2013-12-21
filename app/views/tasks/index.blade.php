@extends('layouts.default')
     @section('content')
     	<h2>Tasks Overview</h2>
        {{ $tasks->links() }}
        @if($tasks)
     	@foreach($tasks as $t)
     	<div class="task">
     		<div class="left">
                <h4>{{ HTML::linkRoute('projects.tasks.show', $t->name, array($t->project->id, $t->id)) }}</h4>
                @if($t->tasklist)
     			<h4>{{ $t->tasklist }}</h4>
                @endif
     			<p>{{ $t->description }}</p>
     			<p>Task List: <i>{{ $t->tasklist }}</i></p>
     		</div>
     		<div class="right">
     			<p>Created by: <i>{{ $t->createdBy->first_name . " " . $t->createdBy->last_name }}</i></p>
     			@if($t->assigned_to)
     			<p>Assigned to: <i>{{ $t->assignedTo->first_name . " " . $t->assignedTo->last_name }}</i></p>
     			@else
     			<p>Assigned to: <i>unassigned</i></p>
     			@endif
     			<p>Total Budget: <i>{{ $t->budget_total }}</i></p>
     			<p>Used Budget: <i>{{ $t->budget_used }}</i></p>
     			<p>Begin on: <i>{{ getMdy($t->begin_date) }}</i></p>
     			<p>Due on: <i>{{ getMdy($t->due_date) }}</i></p>
     			<p>Completed on: <i>{{ getMdy($t->end_date) }}</i></p>
     		</div>
     	</div>
     	@endforeach
        {{ $tasks->links() }}
        @endif
     @stop