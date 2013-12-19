<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		{{ HTML::style('/css/main.css') }}
	</head>
	<body>
		<div id="container">
            <div id="header">
                <div id="topper">
                    @if(isset($user))
                    <p>You are logged in as {{ $me->username }}</p>
                    @else
                    <p>You are not logged in</p>
                    @endif
                </div>
                <h1>LaraManager</h1>
            </div>
			<nav>
				<ul>
					<li>{{ HTML::linkRoute('home', 'Home') }}</li>
				@if($user)
					<li>Projects
						<ul>
							<li>{{ HTML::linkRoute('projects.index', 'Overview') }}</li>
							<li>{{ link_to_route('projects.create', 'Create Project') }}</li>
						</ul>
					</li>
					@if($user->usertype == "admin")
					<li>Users
						<ul>
							<li>{{ HTML::linkRoute('users.index', 'Overview') }}</li>
							<li>{{ link_to_route('users.create', 'Create User') }}</li>
						</ul>
					</li>
					<li>Tasks
						<ul>
							<li>{{ HTML::linkRoute('projects.tasks.index', 'Tasks Overview') }}</li>
                            <li>{{ HTML::linkRoute('projects.tasklists.index', 'Task List Overview') }}</li>
							<li>{{ HTML::linkRoute('projects.tasks.create', 'Create Task') }}</li>
                            <li>{{ HTML::linkRoute('projects.tasklists.create', 'Create Task List') }}</li>
						</ul>
					</li>
					@endif
				@endif
				</ul>
			</div>