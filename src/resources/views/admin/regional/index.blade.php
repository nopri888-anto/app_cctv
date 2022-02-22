@extends('layout.admin_layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        {{-- @if(Session::has('success'))
        <div class="alert alert-default-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{Session::get('success')}}
        </div>
        @endif --}}
        <h3 class="card-title"><a href="{{route('regional.create')}}" class="btn btn-success">{{__('Add Branch')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Regional</th>
                    <th>Regional Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mregions as $key => $mregion)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mregion->regionid}}</td>
                    <td>{{$mregion->regionname}}</td>
                    <td>
                        <a href="{{route('regional.edit',$mregion->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('regional.delete',$mregion->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @include('sweetalert::alert')
    @endsection
