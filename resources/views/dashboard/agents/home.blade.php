@extends('dashboard.partial.layout')

@section('page')
<div class="p-md-4">
	
<div class="d-flex align-items-center justify-content-between mb-0">
	<div>
		<p class="h3 font-nunito font-weight-bold mb-0">Agents</p>
		<p class="lead font-nunito mb-0">Agents perform uptime monitoring for Systems and Services</p>
	</div>
	<div>
		<a class="btn btn-primary font-nunito font-weight-bold" href="{{route('dashboard.agents.create')}}"><i class="fas fa-plus-circle mr-2"></i>New Agent</a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-12 col-md-4">
		<div class="card">
			<div class="card-body align-middle">
				<div class="py-3 text-center">
					<p class="display-4 font-nunito mb-0">{{App\Agent::whereActive(true)->count()}}</p>
					<p class="font-nunito font-weight-bold text-muted mb-0">Active Agents</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-8">
		<div class="card">
			<div class="card-body text-center">
				<p class="text-muted py-5 mb-0">Something important will go here.</p>
			</div>
		</div>
	</div>
</div>
<hr>
<div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Monitor URL</th>
      <th scope="col">Frequency</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($agents as $agent)
    <tr>
      <th scope="row">
      	<a href="{{$agent->url()}}">{{$agent->id}}</a>
      </th>
      <td>{{$agent->name}}</td>
      <td>{{$agent->check_url}}</td>
      <td>{{$agent->humanFrequency()}}</td>
      <td>{{$agent->active ? 'active' : 'inactive'}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
@endpush