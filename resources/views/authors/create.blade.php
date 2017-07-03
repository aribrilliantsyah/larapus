
@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li><a href="{{ url('/admin/authors') }}">Penulis</a></li>
					<li class="active">Tambah Penulis</li>
				</ul>
				<div class="panel panel-custom">
					<div class="panel-heading panel-heading-custom">
						<h2 class="panel-title panel-title-custom"><i class="fa fa-plus-circle"></i> <i class="fa fa-users"></i> Tambah Penulis</h2>
					</div>

					<div class="panel-body">
						{!! Form::open(['url' => route('authors.store'),
						'method' => 'post', 'class'=>'form-horizontal']) !!}
						@include('authors._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
