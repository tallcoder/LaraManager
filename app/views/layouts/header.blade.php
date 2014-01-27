<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		{{ HTML::style('/css/main.css') }}
	</head>
	<body>
		<div id="container" class="col-md-10">
            <div id="header">
                <div id="topper">
	                  <span class="glyphicon glyphicon-user"></span>
                    @if(isset($me))
                    <p>You are logged in as {{ $me->username }} ( {{ $me->usertype }} )</p>
                    @else
                    <p>You are not logged in</p>
                    @endif
                </div>
	            <a href="/">{{ HTML::image('images/laramanager-logo.png', 'LaraManager', array('id'=>'logo')) }}</a>
            </div>
			<nav class="navbar navbar-brand" role="navigation">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li>{{ HTML::linkRoute('home', 'Home') }}</li>
	                @if(isset($me))
										@if($me->usertype == 'client')
	                    <li>{{ HTML::linkRoute('users.show', 'My Overview', array($me->id)) }}</li>
	                @endif
	                @if($me->usertype == "admin" || $me->usertype == 'staff')
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::linkRoute('projects.index', 'Overview') }}</li>
                    <li>{{ link_to_route('projects.create', 'Create Project') }}</li>
                </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::linkRoute('users.index', 'Overview') }}</li>
                    <li>{{ link_to_route('users.create', 'Create User') }}</li>
                </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tasks <b class="caret"></b></a>
                <ul class="dropdown-menu">
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
			</nav>
			<div style="clear:both; float: none;"></div>
