<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script language="javascript">
    $(function() {
        // Jika semua sub checkbox diceklis maka Checkbox Pilih Semua akan diceklis juga
        $(".check-box").click(function() {

            if ($(".check-box").length == $(".check-box:checked").length) {
                $(".check-box").attr("checked", "checked");
            } else {
                $(".check-box").removeAttr("checked");
            }

        });
    });

</script>

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
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('Add Scorecard Data')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('scorecard.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{__('Scorecard Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="scorecarname">
                            </div>
                        </div>
                        <div class="form-group clearfix row">
                            <label class="col-form-label col-sm-3">{{__('Aspek name')}}</label>
                            @foreach($maspeks as $maspek)
                            <div class="custom-control icheck-primary d-inline">
                                <input type="checkbox" name="aspekfk[]" class="" value="{{$maspek->id}}">
                                <label>
                                    {{$maspek->aspectname}}
                                </label>
                            </div>
                            @endforeach

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{__('Description')}}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{__('Status')}}</label>
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
