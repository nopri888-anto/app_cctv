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
        <h3 class="card-title"><a href="{{route('branch.create')}}" class="btn btn-success">{{__('Add Regional')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Regional</th>
                    <th>ID Branch</th>
                    <th>Branch</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mbranch as $key => $mbranch)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mbranch->regionname}}</td>
                    <td>{{$mbranch->branchid}}</td>
                    <td>{{$mbranch->branchname}}</td>
                    <td>{{$mbranch->branchaddress}}</td>
                    <td>{{$mbranch->branchcity}}</td>
                    <td>
                        <a href="{{ route('branch.edit',$mbranch->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('branch.delete',$mbranch->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
