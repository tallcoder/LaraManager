@foreach($comments as $comment)
	<div class="comment">
	<h4>{{ $comment->user->username }} at {{ getMdyTime($comment->created_at) }}</h4>
	<p>{{ $comment->description }}</p>
	</div>
@endforeach