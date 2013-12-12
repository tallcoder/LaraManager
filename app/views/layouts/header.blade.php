<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		{{ HTML::style('/css/main.css') }}
	</head>
	<body>
		<div id="container">
			<div id="topper">
				@if($user)
				<p>You are logged in as {{ $user->usename }}</p>
				@else
				<p>You are not logged in</p>
				@endif
			</div>
			<div id="nav">
				<h1>Project Manager</h1>
				@if($user->usertype == "admin")
				<a href="{{ link_to_route('projects.create') }}">Create Project</a>
				@endif
			</div>