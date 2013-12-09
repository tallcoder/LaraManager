<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	{{ HTML::style('/css/main.css') }}
</head>

<body>
	<div id="container">

		<div id="header">
			{{ HTML::link('/', 'Project Manager') }}
		</div><!-- end header -->

		<div id="nav">
			<ul>
				<li>{{ HTML::link('home', 'Home') }}</li>
				<li>{{-- HTML::link('login', 'Login') --}}</li>
			</ul>
		</div><!-- end nav -->

		<div id="content">
			@if(Session::has('message'))
				<p id="message">{{ Session::get('message') }}</p>
			@endif

			@yield('content')
		</div><!-- end content -->

		<div id="footer">
			&copy; Project Manager {{ date('Y') }}
		</div><!-- end footer -->

	</div><!-- end container -->
</body>
</html>