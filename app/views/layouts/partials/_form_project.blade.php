<tr>
	<td>{{ $project->name }}</td>
	<td>{{ $project->budget_total }}</td>
	<td>{{ $project->completed }}</td>
	<td><a href="{{ $project->url }}">Link</a></td>
</tr>
	<p class="description">{{ $project->description }}</p>