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
                    <h3 class="card-title">{{__('Add Branch Data')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('branch.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('ID Regional')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="mregionfk">
                                    <option value="">{{__('--Regional--')}}</option>
                                    @foreach($mregions as $key => $mregion)
                                    <option value="{{$mregion->id}}">{{$mregion->regionname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('ID Branch')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputIdRegional" name="branchid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputNameRegional" class="col-sm-3 col-form-label">{{__('Name Branch')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputNameRegional" name="branchname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Textarea</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="branchaddress"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputNameRegional" class="col-sm-3 col-form-label">{{__('City')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputNameRegional" name="branchcity">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('Save Branch')}}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
