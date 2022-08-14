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
                        <table class="table table-bordered table-striped" id="tab">
                            <thead>
                                <tr id="kolom">
                                    <th class="btn_delete">
                                        <label class="container">
                                            <input type="checkbox" class="sub_chk" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                        <br>
                                    </th>
                                    <th>type</th>
                                    <th>id</th>
                                    <th>model</th>
                                    <th>user</th>
                                    <th>properties</th>
                                    <th>ip_address</th>
                                    <th>uri_access</th>
                                    <th>user_agent</th>
                                    <th>Tanggal</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr id="tr_{{$d->id}}">
                                    <td class="btn_delete">
                                        <label class="container">
                                            <input type="checkbox" class="sub_chk" data-id="{{$d->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$d->description}}</td>
                                    <td>{{$d->subject_id}}</td>
                                    <td>{{$d->subject_type}}</td>
                                    <td>{{$d->causer_id}}</td>
                                    <td>{{$d->properties}}</td>
                                    <td>{{$d->ip_address}}</td>
                                    <td>{{$d->uri_access}}</td>
                                    <td>{{$d->user_agent}}</td>
                                    <td>{{date_formatted($d->created_at,'%e %b %Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-6">
                                <ul class="pagination justify-content-left">Jumlah Data : {{$data->total()}} </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="pagination justify-content-end">
                                    {{ $data->appends(\Illuminate\Support\Arr::except(request()->input(), '_token'))->setPath(url($segment))->links() }}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection