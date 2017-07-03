@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="'col-md-12">
			<div class="panel panel-custom">
				<div class="panel-heading panel-heading-custom">
					<h2 class="panel-title panel-title-custom"><i class="fa fa-list-alt"></i>  Daftar Buku</h2>
				</div>
				<div class="panel-body">
				  
	              {!! $html->table(['class'=>'table-stripe']) !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection

