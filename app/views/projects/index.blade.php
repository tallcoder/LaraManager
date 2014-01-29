@extends('layouts.default')
@section('content')

<h3>Staff Overview - Projects</h3>
<button class="desc-toggle">Toggle Descriptions</button>
<table class="projects table-bordered table-striped">
	<thead>
	<tr class="header">
		<th data-sort="string">Name</th>
		<th data-sort="string">Client</th>
		<th data-sort="int">Budget Used</th>
		<th data-sort="int">Budget Total</th>
		<th data-sort="int">Budget Remaining</th>
		<th data-sort="string">Dev Site</th>
		<th>Edit Link</th>
		<th data-sort="int">Attachments</th>
	</tr>
</thead>
	{{-- make sure the clients don't see staff projects --}}

@if($me->usertype == 'client')
	<tbody>
	@foreach($projects->publicProjects as $project)
		@include('layouts.partials._projects_index_loop')
	@endforeach
	</tbody>
@else
	<tbody>
	@foreach($projects as $project)
		@include('layouts.partials._projects_index_loop')
	@endforeach
	</tbody>
@endif

	{{-- end projects loop --}}

</table>
{{-- pagination --}}

{{ $projects->links() }}
@stop