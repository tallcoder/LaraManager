@extends('layouts.default')

@section('content')
<h3>Internet Connection Project Management</h3>
<h4>Staff: Please {{ HTML::link('/', 'Login') }} to Continue.</h4>
<h4>Clients: Please {{ HTML:: link('/', 'Login') }} to view your project</h4>
@stop