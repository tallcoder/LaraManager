	<div id="footer">
		<p>&copy; ProMan {{ date('Y') }} {{ HTML::linkRoute('logout', 'Logout') }}</p>
	</div>
	</div>{{-- end container --}}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::script('/js/validate.jquery.js') }}
	{{ HTML::script('/js/custom.jquery.js') }}
</body>
</html>