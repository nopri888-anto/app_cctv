@extends('layout.admin_layout')

@section('content')

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <div class="form-group row">
                    <div class="col-sm-8">
                        <p></p>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{ date('H:i:s') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('Regional')}}</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$mcam->regionname}}">
                </div>
                <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('Branch')}}</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$mcam->branchname}}">
                </div>
                <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('Outlate')}}</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$mcam->outlatename}}">
                </div>
                <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('ID CCTV')}}</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$mcam->camid}}">
                </div>

            </div>
            <br>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-8">
                        <div id="divPlugin" class="plugin"></div>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
            </div>
            <br>
            <div class="card-footer">
                <form method="get" action="#">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" name="find" id="find" placholder="Must be filled..." class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success mb-1">Find</button>
                            <button type="reset" class="btn btn-danger mb-1">Reset</button>
                            <a href="{{route('user.score',$mcam->camip)}}" type="btn" class="btn btn-info mb-1">Add Audit</a>
                        </div>
                        <div class="col-sm">
                        </div>
                    </div>
                </form>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Auditee</th>
                            <th>Auditor</th>
                            <th>Tanggal Audit</th>
                            <th>Petugas</th>
                            <th>Skor</th>
                            <th>Yudisium</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taudit as $key => $audit)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$audit->audittime}}</td>
                            <td>{{$audit->auditscore}}</td>
                            <td>{{$audit->yudisium}}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
