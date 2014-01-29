<tr class="project">
	<td>{{ HTML::linkRoute('projects.show', $project->name, array($project->id)) }}</td>
	<td>{{ HTML::linkRoute('users.show', $project->user->first_name . " " .  $project->user->last_name, array($project->user->id)) }}</td>
	<td data-sort-value="{{ $project->budget_used }}">${{ $project->budget_used }}</td>
	<td data-sort-value="{{ $project->budget_total }}">${{ $project->budget_total }}</td>
	<td data-sort-value="{{ $project->budget_total - $project->budget_used }}">${{ $project->budget_total -
	$project->budget_used }}</td>
	<td><a href="{{ $project->url }}">Link</a></td>
	<td><a href="/projects/{{ $project->id }}/edit">Edit</a></td>
	<td>{{ $project->uploads->count() }}</td>
	</td>
</tr>
<tr class="description">
	<td colspan="8">{{ $project->description }}</td>
</tr>