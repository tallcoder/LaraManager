@extends('layouts.default')
     @section('content')
     	<h2>Tasks Overview</h2>
        {{ $tasks->links() }}
        @if($tasks)
     	<div class="task">
     		<table class="table table-striped table-bordered">
		      <thead>
		        <tr>
			        <th>Name</th>
			        <th data-sort="string">Task List</th>
			        <th data-sort="string">Created By</th>
			        <th data-sort="string">Assigned To</th>
			        <th data-sort="int" class="narrow">Total Budget</th>
			        <th data-sort="int" class="narrow">Used Budget</th>
			        <th>Begin On</th>
			        <th>Due Date</th>
			        <th>Completed</th>
			        <th>Description</th>
		        </tr>
		      </thead>
		      <tbody>
		        @foreach($tasks as $t)
		        <tr>
	          <td>{{ HTML::linkRoute('projects.tasks.show', $t->name, array($t->project->id, $t->id)) }}</td>
	            @if($t->tasklist)
	            <td>{{ $t->tasklist }}</td>
			        @else
			        <td>None</td>
	            @endif
	          <td>{{ $t->createdBy->first_name . " " . $t->createdBy->last_name }}</td>
	          @if($t->assigned_to)
	          <td>{{ $t->assignedTo->first_name . " " . $t->assignedTo->last_name }}</td>
	          @else
	          <td>unassigned</td>
	          @endif
	          <td data-sort-value="{{ $t->budget_total }}" class="narrow">{{ $t->budget_total }}</td>
	          <td data-sort-value="{{ $t->budget_used }}" class="narrow">{{ $t->budget_used }}</td>
	          <td>{{ getMdy($t->begin_date) }}</td>
	          <td>{{ getMdy($t->due_date) }}</td>
	          <td>{{ getMdy($t->end_date) }}</td>
			      <td>{{ ellipsify($t->description) }}</td>
		        </tr>
		        @endforeach
		      </tbody>
		      </table>
     		</div>
     	</div>
        {{ $tasks->links() }}
        @endif
     @stop