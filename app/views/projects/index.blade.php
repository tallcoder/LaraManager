@extends('layouts.default')

@section('content')
@if(Session::get('flash_message'))
	<div class="flash">
		{{ Session::get('flash_message') }}
	</div>
@endif
<h3>Staff Overview</h3>
@stop