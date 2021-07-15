@extends('layout.admin_layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            @if(Session::has('errors'))
            <div class="alert alert-default-danger alert-dismissible fade show" role="alert">
                {{__('Error :')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">{{__('Add Scorecard Data')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('scorecard.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Aspek')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="maspectfk">
                                    <option value="">{{__('--Aspek--')}}</option>
                                    @foreach ($maspeks as $maspek)
                                    <option value="{{$maspek->id}}">{{$maspek->aspectname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Scorecard Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputIdRegional" name="scorecarname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Description')}}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Status')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="">{{__('--Status--')}}</option>
                                    <option value="1">{{__('Aktif')}}</option>
                                    <option value="2">{{__('Non Aktif')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('Save Scorecard')}}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
