@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Ubah Profile</li>
			</ul>
			<div class="panel panel-custom">
				<div class="panel-heading panel-heading-custom">
					<h2 class="panel-title panel-title-custom"><i class="fa fa-pencil"></i> <i class="fa fa-user"></i> Ubah Profile</h2>
				</div>
				<div class="panel-body">
					{!! Form::model(auth()->user(),['url'=>'/settings/profile','method'=>'post','class'=>'form-horizontal']) !!}

                    <div class="form-group{{$errors->has('name') ? 'has-error' : ''}} ">
                        {!! Form::label('name','Nama',['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                            {!! $errors->first('name','<p class="help-block">:message</p>')!!}
                        </div>
                    </div>

                    <div class="form-group{{$errors->has('email') ? 'has-error' : ''}} ">
                        {!! Form::label('email','Alamat email',['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                            {!! $errors->first('email','<p class="help-block">:message</p>')!!}
                        </div>
                    </div>
                    <div class="form-group">
	                  <div class="col-md-6 col-md-offset-4">
		                    {{ Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] )  }}
	                  </div>
                   </div>
                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection