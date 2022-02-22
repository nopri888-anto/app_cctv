@extends('layout.admin_layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        @if(Session::has('success'))
        <div class="alert alert-default-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{Session::get('success')}}
        </div>
        @endif
        <h3 class="card-title"><a href="{{route('cam.create')}}" class="btn btn-success">{{__('Add Camera')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Outlet</th>
                    <th>ID Camera</th>
                    <th>IP</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Port</th>
                    <th>RTSP</th>
                    <th>Device Port</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mcam as $key => $mcam)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mcam->outlatename}}</td>
                    <td>{{$mcam->camid}}</td>
                    <td>{{$mcam->camip}}</td>
                    <td>{{$mcam->camusername}}</td>
                    <td>{{$mcam->campassword}}</td>
                    <td>{{$mcam->camport}}</td>
                    <td>{{$mcam->camrtsp}}</td>
                    <td>{{$mcam->camdeviceport}}</td>
                    <td>
                        <a href="{{ route('cam.edit',$mcam->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('cam.delete',$mcam->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
