{{ Form::label('comment', 'Comment:') }}
{{ Form::textarea('comment') }}
{{ Form::hidden('parent', $project->id) }}
{{ Form::hidden('user', $user->id) }}