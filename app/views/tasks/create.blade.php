@extends('layouts.default')
@section('content')
	{{ Form::open(array('route'=>'projects.tasks.store', 'id'=>'new_task')) }}
		<p>
			{{ Form::label('name', 'Title:') }}
			{{ Form::text('name') }}
		</p>
		<p>
			{{ Form::label('list', 'Task List:') }}
			<select class="tasklist">
				<option value="1">First Task List</option>
				<option value="2">Second Task List</option>
			</select>
		</p>
		<p>
			{{ Form::label('budget', 'Budget:') }}
			$<input type="number" name="budget" id="budget" value="100" min="0" step="5" />
		</p>
		<p>
			{{ Form::label('description', 'Description:') }}<br />
			{{ Form::textarea('description') }}
		</p>
		<p>
			{{ Form::label('begin_date', "Begin On:") }}
			<input type="date" id="begin_date" name="begin_date" />
		</p>
		<p>
			{{ Form::label('due_date', "Due On:") }}
			<input type="date" id="due_date" name="due_date" />
		</p>
		<p>
			{{ Form::label('assigned_to', 'Assign To:') }}
			<select name="assigned_to" id="assigned_to" class="assign">
				<option value="0">---</option>
				@foreach($staff as $s)
					<option value="{{ $s->id }}">{{ $s->username }}</option>
				@endforeach
			</select>
		</p>
	{{ Form::submit() }}
	{{ Form::close() }}
@stop