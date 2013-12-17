	{{ Form::open(array('route' => 'projects.tasklists.store')) }}
	<p>
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name') }}
	</p>
	<p>
		{{ Form::label('description', 'Description:') }}<br />
		{{ Form::textarea('description') }}
	</p>
	{{ Form::label('parent', 'Project:') }}<br />
	<select name="parent">
		<option value="---">
		@foreach($projects as $p)
			<option value="{{ $p->id }}">{{ $p->name }}</option>
		@endforeach
	</select><br />
	{{ Form::submit('Create') }}
	{{ Form::close() }}