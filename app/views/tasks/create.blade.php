@extends('layouts.default')
@section('content')
    <h2>Create Task</h2>
	{{ Form::open(array('route'=>'projects.tasks.store', 'id'=>'new_task')) }}
		<p>
			{{ Form::label('name', 'Title:') }}
			{{ Form::text('name') }}
		</p>
		<p>
			{{ Form::label('list', 'Task List:') }}
			<select class="tasklist">
					<option value="0">----</option>
				@foreach($lists as $t)
					<option value="{{ $t->id }}">{{ $t->name }}</option>
				@endforeach
			</select>
		</p>
		<p>
			{{ Form::label('project', 'Project:') }}
			<select class="projectlist">
            @if(isset($project))
			<option value="{{ $project->id }}" selected>{{ $project->name }}</option>
            @endif
			<option value="0">----</option>
			@foreach($projects as $p)
			<option value="{{ $p->id}}">{{ $p->name }}</option>
			@endforeach
			</select>
		</p>
        <p>
            {{ Form::label('type', 'Task Type:') }}
            {{ Form::select('type', array('design' => 'Design', 'programming' => 'Programming', 'other' => 'Other')) }}
        </p>
		<p>
			{{ Form::label('budget', 'Budget:') }}
			$<input type="number" name="budget" id="budget" value="100" min="0" />
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
            {{ Form::file('file1') }}
            {{ Form::label('perm1' ,'Who can view this?') }}
            All{{ Form::radio('perm1', 'all') }}
            Staff{{ Form::radio('perm1', 'staff') }}
            Admin{{ Form::radio('perm1', 'admin') }}<br />
            {{ Form::file('file2') }}
            {{ Form::label('perm2' ,'Who can view this?') }}
            All{{ Form::radio('perm2', 'all') }}
            Staff{{ Form::radio('perm2', 'staff') }}
            Admin{{ Form::radio('perm2', 'admin') }}<br />
            {{ Form::file('file3') }}
            {{ Form::label('perm3' ,'Who can view this?') }}
            All{{ Form::radio('perm3', 'all') }}
            Staff{{ Form::radio('perm3', 'staff') }}
            Admin{{ Form::radio('perm3', 'admin') }}
        <br />
	{{ Form::submit() }}
	{{ Form::close() }}
@stop