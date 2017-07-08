@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Profile</li>
			</ul>
			<div class="panel panel-custom">
				<div class="panel-heading panel-heading-custom">
					<h2 class="panel-title panel-title-custom"><i class="fa fa-user"></i> Profile</h2>
				</div>
				<div class="panel-body">
					<table class="table">
						<tbody>
							<tr>
								<td class="text-muted">Nama</td>
								<td>{{auth()->user()->name}}</td>
							</tr>
							<tr>
								<td class="text-muted">Email</td>
								<td>{{auth()->user()->email}}</td>
							</tr>
						</tbody>
					</table>
					<a class="btn btn-primary" href="{{url('/settings/profile/edit')}}"><i class="fa fa-pencil"></i> Ubah</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection