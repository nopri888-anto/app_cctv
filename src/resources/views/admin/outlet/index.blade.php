@extends('layout.admin_layout')

@section('content')
<div class="card">
    <div class="card-header">
        @if(Session::has('success'))
        <div class="alert alert-default-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{Session::get('success')}}
        </div>
        @endif
        <h3 class="card-title"><a href="{{route('outlet.create')}}" class="btn btn-success">{{__('Add Outlet')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Branch</th>
                    <th>Outlet Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($moutlet as $key => $moutlet)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$moutlet->branchname}}</td>
                    <td>{{$moutlet->outlatename}}</td>
                    <td>
                        <a href="{{route('outlet.edit',$moutlet->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('outlet.delete',$moutlet->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
