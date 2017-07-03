@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-custom">
                <div class="panel-heading panel-heading-custom"><i class="fa fa-desktop"></i> Dashboard</div>

                <div class="panel-body">
                    Selamat datang di Larapus.</br></br>
                    <table class="table">
                     <tbody>
                       <tr>
                        <td>Buku Dipinjam </td>
                        <td>
                            @if($borrowLogs->count() == 0)
                            Tidak ada buku yang dipinjam.
                            @endif
                            <ul>
                               @foreach($borrowLogs as $borrowLog)
                               <li>
                                   {!! Form::open(['url'=> route('member.books.return',$borrowLog->book_id),
                                    'method' => 'put',
                                    'class'  => 'form-inline js-confirm',
                                    'data-confirm' => 'Anda yakin hendak mengembalikan Buku '.$borrowLog->book->title.'?'
                                   ]) 
                                   !!}
                                   {!! $borrowLog->book->title !!}
                                   
                               </li>
                               {!! Form::button('<i class="fa fa-mail-forward"></i> Kembalikan',['type'=>'submit','class'=>'btn btn-xs btn-primary']) !!}
                               <br>
                               @endforeach
                            </ul>
                        </td>
                       </tr>
                     </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
