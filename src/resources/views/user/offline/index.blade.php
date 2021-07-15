@extends('layout.user_layout')

@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                        @foreach($mcam as $key => $mcam)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$mcam->regionname}}</td>
                            <td>{{$mcam->branchname}}</td>
                            <td>{{$mcam->outlatename}}</td>
                            <td>{{$mcam->camid}}</td>
                            <td>
                                <a href="{{ route('offline.show',$mcam->id) }}" class="btn btn-warning">Select</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
