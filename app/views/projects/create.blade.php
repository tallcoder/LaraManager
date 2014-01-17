@extends('layouts.default')

@section('content')
{{ Form::open(array('route' => 'projects.store', 'id' => 'create_project')) }}
{{ Form::label('name', 'Name:') }}
{{ Form::text('name') }}<br />
{{ Form::label('client_name', 'Client Name:') }}

<select id="user" name="user">
@foreach($users as $user)
	<option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
@endforeach
</select><br />
{{ Form::label('link', 'Dev Site Address:') }}
&nbsp;http://{{ Form::text('link') }}.icwebdev.com<br />
{{ Form::label('budget', 'Budget:') }}
$<input type="number" name="budget" id="budget" min="0" max="50000" value="0" /><br />
@if($me->usertype == 'admin' || $me->usertype == 'staff')
<br />
{{ Form::label('staffonly', 'Staff Only?') }}
{{ Form::checkbox('staffonly', 'true') }}
@endif
{{ Form::label('description', 'Description:') }}<br />
{{ Form::textarea('description', "", array('class'=>'tiny')) }}<br />
{{ Form::submit() }}
{{ Form::close() }}

@stop
