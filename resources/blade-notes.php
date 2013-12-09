
<!-- this isn't escaped!! -->
<p>{{ $someVar }}</p>

<!-- this is escaped! -->
<p>{{{ <script>alert('hi');</script> }}}


<!-- if-elseif-else-endif flow control -->
@if ($something)
	<p>something returned true!</p>
@elseif ($somethingelse)
	<p>something else is true</p>
@else
	<p>well damnit</p>
@endif

<!-- foreach loop -->

@foreach ($someThings as $thing)
	<p>{{ $thing }}
@endforeach

@while (isPositive($anotherThing))
	<p>Still positive</p>
@endwhile

<!-- inverse of if -->
@unless($anotherThing)
	<p>not another thing, yet!</p>
@endunless


