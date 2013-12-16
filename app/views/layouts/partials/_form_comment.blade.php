{{ Form::textarea('comment') }}
{{ Form::hidden('parent', $project->id) }}
{{ Form::hidden('user', $user->id) }}
{{ Form::hidden('type', 'p_comment') }}