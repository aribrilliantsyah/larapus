
@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li><a href="{{ url('/admin/books') }}">Buku</a></li>
					<li class="active">Ubah Buku</li>
				</ul>
				<div class="panel panel-custom">
					<div class="panel-heading panel-heading-custom">
						<h2 class="panel-title panel-title-custom"><i class="fa fa-pencil"></i> <i class="fa fa-book"></i> Ubah Buku</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($book,['url' => route('books.update',$book->id),
						'method' => 'put','files'=>'true','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
						@include('books._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
