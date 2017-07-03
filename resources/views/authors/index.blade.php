@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="'col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Penulis</li>
			</ul>
			<div class="panel panel-custom">
				<div class="panel-heading panel-heading-custom">
					<h2 class="panel-title panel-title-custom"><i class="fa fa-users"></i> Penulis</h2>
				</div>
				<div class="panel-body">
				  <p><a class="btn btn-primary" href="{{route('authors.create')}}"><i class="fa fa-plus-circle"></i> Tambah</a></p>
	              {!! $html->table(['class'=>'table-striped'])!!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection

