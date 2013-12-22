@extends('layouts.default')
@section('content')

<h3>Staff Overview - Projects</h3>
<table class="projects">
	<tr class="header">
		<th>Name</th>
		<th>Client</th>
		<th>Budget Used</th>
		<th>Budget Total</th>
		<th>Budget Remaining</th>
		<th>Dev Site</th>
		<th>Edit Link</th>
		<th>Attachments</th>
	</tr>

	{{-- make sure the clients don't see staff projects --}}

@if($me->usertype == 'client')
	@foreach($projects->publicProjects as $project)
		@include('layouts.partials._projects_index_loop')
	@endforeach
@else
	@foreach($projects as $project)
		@include('layouts.partials._projects_index_loop')
	@endforeach
@endif

	{{-- end projects loop --}}

</table>
{{-- pagination --}}

{{ $projects->links() }}
@stop