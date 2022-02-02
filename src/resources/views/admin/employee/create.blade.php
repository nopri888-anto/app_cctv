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
                    <h3 class="card-title">{{__('Add Data')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('employee.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('ID Position')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputIdRegional" name="positioncode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Position Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputIdRegional" name="positionname">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('Save Data')}}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
