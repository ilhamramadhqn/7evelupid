@extends('Master.Layout.apps')
@section('content')
@component('Master/Layout/form_up')@endcomponent
@php 
$segment=Request::segment(1); 

if(Request::segment(2) == 'create' )
{
    $action=$segment.'.store';
    $method='POST';
}
else
{
    $action=$segment.'.update' ; 
    $method='PUT';
    $action = [$segment.'.update', $d->id]; 
}
$n=1;

@endphp
@if($data->total()>0)
  <div class="col-md-12 table-responsive">    
            <table class="table table-bordered table-striped" id="tab">
                <thead >
                    <tr id="kolom">
                        <th class="btn_delete">
                            <label class="container">
                                <input type="checkbox" class="sub_chk" id="check_all">
                                <span class="checkmark"></span>
                            </label>
                            <br>
                        </th>
                        <th>nip</th>
                        <th>nama</th>
                        <th>jabatan</th>
                        <th>bagian</th>
                        <th>action</th>
                    </tr>
                </thead>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->nip}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->jabatan}}</td>
                    <td>{{$d->bagian}}</td>
                    <td>
                        <button type="button" class="btn btn-success tambah-user" data-dismiss="modal" data-username="{{$d->nip}}" data-nama="{{$d->nama}}" data-email="{{$d->email}} "data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="feather icon-plus"></i>
                        </button>

                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-md-6">
                    <ul class="pagination justify-content-left">Jumlah Data : {{$data->total()}}</ul>
                </div>
                <div class="col-md-6">
                    <ul class="pagination justify-content-end">{{$data->links()}}</ul>
                </div>
            </div>
        </div>
        <hr>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="button" class="btn btn-warning batal" ><i class='feather icon-chevrons-left'></i>&nbsp Kembali</button>
    </div>
</div>

@component('Master/Layout/form_dw')@endcomponent


<div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {{ Form::model($d, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            {!! Form::text('username', null, array('placeholder' => 'Text','class' => 'form-control','id' => 'username','readonly')) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            {!! Form::text('name', null, array('placeholder' => 'Text','class' => 'form-control','id' => 'name','readonly')) !!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::text('email', null, array('placeholder' => 'Text','class' => 'form-control','id' => 'email','readonly')) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            {!! Form::select('role[]', $roles,[], array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i>&nbsp Simpan</button>
            </div>
            

                {!! Form::close() !!}
                
        </div>
    </div>
</div>
@else
Semua User Sudah Di Add...
<hr>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="button" class="btn btn-warning batal" ><i class='feather icon-chevrons-left'></i>&nbsp Kembali</button>
    </div>
</div>
@endif

<script>

    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })
</script>
@endsection

