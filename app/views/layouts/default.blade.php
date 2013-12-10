@include('layouts.header')

		<div id="content">
		@if(Session::get('flash_message'))
		<div class="flash">
			{{ Session::get('flash_message') }}
		</div>
	@endif
			@yield('content')
		</div><!-- end content -->
@include('layouts.footer')