{!! Form::model($model,['url'=>$form_url,'method'=>'delete','class'=>'form-inline'])!!}
 <a class="btn btn-xs btn-primary" href="{{$edit_url}}" ><i class="fa fa-btn fa-pencil"></i>Ubah</a> |
 {!! Form::submit('Hapus',['class'=>'btn btn-xs btn-btn-danger'])!!}
{!! Form::close()!!}