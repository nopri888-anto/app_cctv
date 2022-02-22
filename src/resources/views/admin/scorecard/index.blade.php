@extends('layout.admin_layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="{{route('scorecard.create')}}" class="btn btn-success">{{__('Add Score Card')}}</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Score Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mscorecardaspect as $key => $mscoredcard)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$mscoredcard->scorecarname}}</td>
                    <td>{{$mscoredcard->description}}</td>
                    <td>
                        <a href="{{route('scorecard.show',$mscoredcard->id) }}" title="Detail Parameter" class="btn btn-info"><i class="fas fa-search nav-icon"></i></a>
                        <a href="{{route('scorecard.delete',$mscoredcard->id)}}" class="btn btn-danger"><i class="fas fa-trash nav-icon"></i></a></td>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    @include('sweetalert::alert')
    @endsection
