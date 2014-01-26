@include('layouts.header')
		@if(Session::get('flash_message'))
		<div class="flash">
			{{ Session::get('flash_message') }}
		</div>
	@endif
			@yield('content')
@include('layouts.footer')