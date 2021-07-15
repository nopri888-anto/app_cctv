@extends('layout.admin_layout')

@section('content')
@if(Session::has('success'))
    <div class="alert alert-default-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{Session::get('success')}}
    </div>
    @endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><a href="{{route('user.create')}}" class="btn btn-success">{{__('Add User')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->userid}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->status}}</td>
                    <td>
                        <a href="{{route('user.edit',$user->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
