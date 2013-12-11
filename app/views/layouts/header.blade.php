<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		{{ HTML::style('/css/main.css') }}
	</head>
	<body>
		<div id="container">
			<div id="topper">
				<p>You are logged in as {{ $user->usename }}</p>
			</div>
			<div id="nav">
				<h1>Project Manager</h1>
			</div>