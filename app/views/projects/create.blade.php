@extends('layouts.default')

@section('content')
{{ Form::open(array('route' => 'projects.store', 'id' => 'create_project')) }}
<div class="input-group">
{{ Form::label('name', 'Name:') }}
{{ Form::text('name', '', array('class' => 'form-control')) }}
</div>
<div class="input-group">
{{ Form::label('client_name', 'Client Name:') }}
<select id="user" name="user" class="form-control">
@foreach($users as $user)
	<option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
@endforeach
</select>
</div>
<div class="input-group">
{{ Form::label('link', 'Dev Site Address:') }}
{{ Form::text('link', '', array('class' => 'form-control')) }}
</div>
<div class="input-group">
{{ Form::label('budget', 'Budget:') }}
$<input type="number" name="budget" class="form-control" id="budget" min="0" max="50000" value="0" />
</div>
@if($me->usertype == 'admin' || $me->usertype == 'staff')
<div class="input-group">
{{ Form::label('staffonly', 'Staff Only?') }}
{{ Form::checkbox('staffonly', 'true', false, array('class' => 'form-control')) }}
</div>
@endif
{{ Form::label('description', 'Description:') }}<br />
{{ Form::textarea('description', "", array('class'=>'tiny form-control')) }}<br />
{{ Form::submit() }}
{{ Form::close() }}

@stop
