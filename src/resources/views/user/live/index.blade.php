@extends('layout.admin_layout')
<style type="text/css">
    iframe {
        margin: 0;
        padding: 0;
        border: 0;
        width: 300px;
        height: 200px;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        border: 0;
    }

    .plugin {
        width: 300px;
        height: 200px;
    }

</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Live Streaming
            </div>
            <div class="card-body">

                <form method="get" action="{{ route('find') }}">
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Regional</th>
                            <th>Branch</th>
                            <th>Outlate</th>
                            <th>CCTV</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mcam as $key => $cam)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$cam->regionname}}</td>
                            <td>{{$cam->branchname}}</td>
                            <td>{{$cam->outlatename}}</td>
                            <td>{{$cam->camid}}</td>
                            <td>
                                <a href="{{route('live.camselect',$cam->id)}}" class="btn btn-warning">Select</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
