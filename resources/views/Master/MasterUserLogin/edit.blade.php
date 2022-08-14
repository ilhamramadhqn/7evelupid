@extends('Master.Layout.apps')
@section('content')
@component('Master/Layout/form_up')@endcomponent
<?php 
$segment=Request::segment(1); 
?>

{!! Form::model($user, ['method' => 'PATCH','route' => ['MasterUserLogin.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label>Username</label>
            {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control','readonly')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label>Name</label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','readonly')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label>Email</label>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','readonly')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label>Role</label>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
        </div>
    </div>
</div>
@component('Master.Layout.form_btn')@endcomponent

{!! Form::close() !!}
@endsection