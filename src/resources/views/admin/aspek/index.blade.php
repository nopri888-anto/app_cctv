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
        <h3 class="card-title"><a href="{{route('aspek.create')}}" class="btn btn-success">{{__('Add Aspek')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aspek</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($maspeks as $key => $maspek)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$maspek->aspectname}}</td>
                    <td>
                        <a href="{{route('aspek.edit',$maspek->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('aspek.delete',$maspek->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
