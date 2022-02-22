@extends('layout.admin_layout')

@section('content')
{{-- @if(Session::has('success'))
    <div class="alert alert-default-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{Session::get('success')}}
    </div>
    @endif --}}
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="{{route('bobot.create')}}" class="btn btn-success">{{__('Add Score')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lower Score</th>
                    <th>Upper Score</th>
                    <th>Yudisium</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mscores as $key => $mscore)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mscore->bottomscore}}</td>
                    <td>{{$mscore->topscore}}</td>
                    <td>{{$mscore->yudisium}}</td>
                    <td>
                        <a href="{{route('bobot.edit',$mscore->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{route('bobot.delete',$mscore->id)}}" class="btn btn-danger">Delete</a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @endsection
