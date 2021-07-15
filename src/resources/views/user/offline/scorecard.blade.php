@extends('layout.user_layout')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Pilih Area')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group row ">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Regional')}}</label>
                            <div class="col-sm">
                                <select class="form-control" name="regional" id="regional">
                                    <option value='0'>-- Regional --</option>
                                    @foreach($mregions['data'] as $region)
                                    <option value="{{$region->id}}">{{$region->regionname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group row ">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Mbranch')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="branch" id="branch">
                                    <option value="0">-- Branch --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group row ">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Outlet')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="outlet" id="outlet">
                                    <option value="0">-- Outlet --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group row ">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('CCTV')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="cctv" id="cctv">
                                    <option value="0">-- CCTV --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <input id="camid" name="camid" type="text" class="form-control">
                    <button type="submit" class="btn btn-primary">{{__('Lanjut')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-3">
                <select id="channels" class="form-control sel"></select>
            </div>
            <div class="col-md-3">
                <select id="streamtype" class="form-control sel">
                    <option value="1">Main stream</option>
                </select>
            </div>
        </div>
        <div id="divPlugin" class="plugin"></div>
        <input class="form-control" id="opinfo" class="opinfo" type="hidden">
    </div>
</div>
<!-- /.card-body -->
@endsection

<script src="{{asset('vendor')}}/dist/js/select.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#regional').change(function() {
            var id = $(this).val();

            //empty branch
            $('#branch').find('option').not(':first').remove();

            //ajax request
            $.ajax({
                url: '/offline/getRegion/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var branchname = response['data'][i].branchname;

                            var option = "<option value='" + id + "'>" + branchname + "</option>";
                            $("#branch").append(option);
                        }
                    }
                }
            });
        });
    });

</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#branch').change(function() {
            var id = $(this).val();

            //empty outlet
            $('#outlet').find('option').not(':first').remove();

            //ajax request
            $.ajax({
                url: '/offline/getOutlet/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var outlatename = response['data'][i].outlatename;

                            var option = "<option value='" + id + "'>" + outlatename + "</option>";
                            $("#outlet").append(option);
                        }
                    }
                }
            });
        });
    });

</script>



<script type='text/javascript'>
    $(document).ready(function() {
        $('#outlet').change(function() {
            var id = $(this).val();

            //empty outlet
            $('#cctv').find('option').not(':first').remove();

            //ajax request
            $.ajax({
                url: '/offline/getOutlateCam/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var camid = response['data'][i].camid;

                            var option = "<option value='" + id + "'>" + camid + "</option>";
                            $("#cctv").append(option);
                        }
                    }
                }
            });
        });
    });

</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#cctv').change(function() {
            var id = $(this).val();

            //empty
            //$('#ip').find('input').not(':first').remove();

            //ajax request
            $.ajax({
                url: '/offline/getDetailCam/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            //var camip = response['data'][i].camip;
                            //var camport = response['data'][i].camport;
                            //var camusername = response['data'][i].camusername;
                            //var campassword = response['data'][i].campassword;
                            //var camrtsp = response['data'][i].camrtsp;
                            //var camdeviceport = response['data'][i].camdeviceport;


                            var input = id;
                            $('#camid').val(input);

                            //var input = camip;
                            //$('#loginip').val(input);

                            //var input = camport;
                            //$('#port').val(input);

                            //var input = camusername;
                            //$('#username').val(input);

                            //var input = campassword;
                            //$('#password').val(input);

                            //var input = camrtsp;
                            //$('#rtspport').val(input);

                            //var input = camdeviceport;
                            //$('#deviceport').val(input);

                            //var input = "<input>" + camip + ;
                            //$('#example2').append(input);
                        }
                    }
                }
            });
        });
    });

</script>
