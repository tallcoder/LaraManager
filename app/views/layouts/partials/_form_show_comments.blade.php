@foreach($comments as $comment)
	<div class="comment">
	<h4>{{ User::find($comment->user_id)->username }} at {{ $comment->created_at }}</h4>
	<p>{{ $comment->description }}</p>
	</div>
@endforeach