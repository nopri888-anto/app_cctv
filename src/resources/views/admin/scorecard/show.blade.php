@extends('layout.admin_layout')
@section('content')

<div class="container-fluid">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Scorecardname</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <form method="get" action="{{ route('search') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" name="search" id="search" placholder="Must be filled..." class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary mb-1">Find</button>
                                <button type="reset" class="btn btn-primary mb-1">Reset</button>
                            </div>
                            <div class="col-sm">
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered" id="scoretabel">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Scorecardname</th>
                                <th>Aspek</th>
                                <th>Description</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mscorecards as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->scorecarname}}</td>
                                <td>{{$value->aspectname}}</td>
                                <td>{{$value->description}}</td>
                                <td>
                                    <a href="{{route('scorecard.additemparameter',$value->id) }}" title="Add Item Parameter" class="btn btn-info"><i class="fas fa-plus nav-icon"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.scorecard')}}" title="Back Menu" class="btn btn-info"><i class="fas fa-long-arrow-alt-left nav-icon"></i></a></td>
        </div>
    </div>
    @endsection
