@extends('Master.Layout.apps')
@section('logincontent')
@php

use Illuminate\Support\Facades\DB;
$copyright=DB::table('mst_configurations')->where('key','copyright_text')->first();

@endphp

<div class="auth-wrapper">
    <div class="auth-content">
        <div class="cardup">
            <br>
            <br>
            <br>
            <img src="assets/images/logos.png" alt="" class="img-fluid ">
                    
        </div>

     <div class="card">
        <div class="row align-items-center text-center">

            <div class="col-md-12">

                <div class="card-body">
                    
                    <h5 class="mb-3 f-w-400">Form Login</h5>
                    <hr>
                    @error('username')
                    <div class="alert alert-dismissable alert-danger">
                        {{ $message }}
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button> -->
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    @enderror


                    @error('password')
                    <div class="alert alert-dismissable alert-danger">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                    </div>
                    @enderror
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal" >
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="feather icon-user"></i></span>
                            </div>
                            <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" >
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="feather icon-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-block btn-primary mb-4">
                            {{ __('Login') }}
                        </button>
                    </form>

                    <p class="mb-2 text-muted"> {!!$copyright->value!!}<p class="mb-2 text-muted">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
