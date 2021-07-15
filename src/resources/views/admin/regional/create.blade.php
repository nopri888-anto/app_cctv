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
                    <h3 class="card-title">{{__('Add Regional Data')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('regional.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">ID Regional</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputIdRegional" name="regionid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputNameRegional" class="col-sm-3 col-form-label">Name Regional</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputNameRegional" name="regionname">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Regional</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
