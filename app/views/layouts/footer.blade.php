	<footer>
		<p>&copy; LaraManager {{ date('Y') }}
		@if($user)
		{{ HTML::linkRoute('logout', 'Logout') }}</p>
		@else
		{{ HTML::linkRoute('home', 'Login') }}
		@endif
	</footer>
	</div>{{-- end container --}}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    {{ HTML::script('/js/jquery.validate.min.js') }}
	{{ HTML::script('/js/custom.jquery.js') }}
</body>
</html>