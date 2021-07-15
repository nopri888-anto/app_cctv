@extends('layout.user_layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{__('Dashboard')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <div class="form-group row">
                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Regional')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="mregionfk">
                            <option value="">{{__('--Regional--')}}</option>
                            <option value="#">Wilayah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group row">
                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Regional')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="mregionfk">
                            <option value="">{{__('--Regional--')}}</option>
                            <option value="#">Wilayah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group row">
                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Regional')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="mregionfk">
                            <option value="">{{__('--Regional--')}}</option>
                            <option value="#">Wilayah</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md">
                <div class="alert alert-default-warning alert-dismissible fade show" role="alert">
                    <p style="color: black; font-size:18px; text-align:center;">SCORE OVERALL : 83.00</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md">
                chart
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Wilayah</th>
                            <th>Score Wilayah</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td>1</td>
                            <td>Jakarta</td>
                            <td>70</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- /.card-body -->
@endsection
