@foreach($comments as $comment)
	<h4>{{ $comment->user_id }}</h4>
	<p>{{ $comment->description }}</p>
@endforeach