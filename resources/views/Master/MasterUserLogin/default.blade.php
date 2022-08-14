@extends('Master.Layout.apps')
@section('content')
<?php
$segment=Request::segment(1);
?>
@include('Master.'.$segment.'.filter')
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h5 id="label"></h5>
        @component('Master.Layout.action_button')
        @endcomponent
        <div class="row">
          <div class="col-md-12 table-responsive">  
            <table class="table table-bordered">
              <thead>
                <tr id="kolom">
                  <th class="btn_delete">
                    <label class="container">
                      <input type="checkbox" class="sub_chk" id="check_all">
                      <span class="checkmark"></span>
                    </label>
                    <br>
                  </th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>reset password</th>
                </tr>
              </thead>
              @foreach ($data as $key => $d)
              <tr id="tr_{{$d->id}}">
                <td class="btn_delete">
                  <label class="container">
                    <input type="checkbox" class="sub_chk" data-id="{{$d->id}}">
                    <span class="checkmark"></span>
                  </label>
                </td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td>
                  @if(!empty($d->getRoleNames()))
                  @foreach($d->getRoleNames() as $v)
                  <label class="badge badge-success">{{ $v }}</label>
                  @endforeach
                  @endif
                </td>
                <td>  
                @can($segment.'.resetPassword')  
                  {!! Form::open(['method' => 'POST','route' => [$segment.'.resetPassword'],'style'=>'display:inline','id'=>'form_resetPassword'.$d->id]) !!}
                  {!! Form::hidden('id', $d->id, array('id' => 'username')) !!}
                 {{ Form::button('Reset', [ 'class' => 'btn btn-info resetPassword',
                 'data-toggle'=>'tooltip',
                 'data-id'=> $d->id,
                 'data-tooltip'=> $d->name,
                 'data-html'=>'true',
                 'data-original-title'=>'Reset <em><u>'.$d->name.'</u></em>',
                 'id'=>'resetPassword'
                 ]) }} 
                 {!! Form::close() !!}
                 @endcan
               </td>
               @component('Master.Layout.edit_delete_button')
               @slot('id') {{$d->id}} @endslot
               @slot('tooltip') {{$d->name}} @endslot
               @endcomponent
             </tr>
             @endforeach
           </table>


           <div class="row">
            <div class="col-md-6">
              <ul class="pagination justify-content-left">Jumlah Data : {{$data->total()}}</ul>
            </div>
            <div class="col-md-6">
              <ul class="pagination justify-content-end">{{ $data->appends(\Illuminate\Support\Arr::except(request()->input(), '_token'))->setPath(url($segment))->links() }} </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  @endsection