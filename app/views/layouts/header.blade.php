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
				<p>You are logged in as {{ $user->username }}</p>
				@else
				<p>You are not logged in</p>
				@endif
			</div>
			<div id="nav">
				<h1>Project Manager</h1>
				@if($user)
					@if($user->usertype == "admin")
					{{ link_to_route('projects.create', 'Create Project') }}
					{{ link_to_route('users.create', 'Create User') }}
					@endif
				@endif
			</div>