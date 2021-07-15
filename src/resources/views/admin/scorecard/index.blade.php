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
        <h3 class="card-title"><a href="{{route('scorecard.create')}}" class="btn btn-success">{{__('Add Score Card')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aspek</th>
                    <th>Score Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mscoredcard as $key => $mscoredcard)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mscoredcard->aspectname}}</td>
                    <td>{{$mscoredcard->scorecarname}}</td>
                    <td>{{$mscoredcard->description}}</td>
                    <td>{{$mscoredcard->status}}</td>
                    <td>
                        <a href="{{route('scorecard.edit',$mscoredcard->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('scorecard.delete',$mscoredcard->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
