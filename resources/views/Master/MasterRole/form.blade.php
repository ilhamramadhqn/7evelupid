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
    $action = [$segment.'.update', $role->id]; 
}

@endphp

{{ Form::model($role, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label>Nama Role</label>
            {!! Form::text('nama', $role->name, array('placeholder' => 'Text','class' => 'form-control','onkeyup'=>'this.value = this.value.toUpperCase();')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">  
        <div class="form-group">
            <strong><u>Permission</u></strong>
        </div>
    </div>
</div>
<div class="row">
    @php
    $not=array('pretty-routes.show','login','logout','password.email','password.request','password.reset','password.update','register','');

    @endphp

    @foreach($menu as $m)
    <div class="col-xs-3 col-sm-3 col-md-3">  
        <i><u>{{ $m->nama_menu }}</u></i>
        <br>

        @foreach ($permission as $p)
        @if( (in_array($p->getName(), $not)) || (preg_match('/store/i',$p->getName())) || (preg_match('/update/i',$p->getName())) )

        @else

        @if(preg_match("/".$m->uri."/i", $p->getName()))
        <label>
            {{ Form::checkbox('permission[]', $p->getName(), in_array($p->getname(),$role_permission) ? true : false, array('id' => 'name')) }} 
            {{$p->getName()}}
        </label>
        <br/>
        @endif

        @endif
        @endforeach

    </div>
    @endforeach

</table>
</div>
@component('Master.Layout.form_btn')@endcomponent

{!! Form::close() !!}


@endsection