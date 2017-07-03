{!! Form::model($model,['url'=>$form_url,'method'=>'delete','class'=>'form-inline js-confirm','data-confirm'=>$confirm_message] )!!}
 <a class="btn btn-xs btn-primary" href="{{$edit_url}}" ><i class="fa fa-btn fa-pencil"></i> Ubah</a> |
 {!! Form::button('<i class="fa fa-trash"></i> Hapus',['type'=>'submit', 'class'=>'btn btn-xs'])!!}
{!! Form::close()!!}