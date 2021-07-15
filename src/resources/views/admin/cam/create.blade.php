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
                    <h3 class="card-title">{{__('Add Camera Data')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('cam.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Outlet')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="moutletfk">
                                    <option value="">{{__('-- Outlet --')}}</option>
                                    @foreach($moutlets as $moutlet)
                                    <option value="{{$moutlet->id}}">{{$moutlet->outlatename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('ID Camera')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputIdRegional" name="camid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('IP')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="loginip" name="camip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Port')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="port" name="camport">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Username')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="camusername">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Password')}}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="campassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('RTSP')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="rtspport" name="camrtsp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputIdRegional" class="col-sm-3 col-form-label">{{__('Device Port')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="deviceport" name="camdeviceport">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputFile" class="col-sm-3 col-form-label">Save record files to</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="recordPath">
                            </div>
                            <div class="col-sm-2">
                                <input type="button" class="btn btn-block btn-info" value="Browse" onclick="clickOpenFileDlg('recordPath', 0);" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputFile" class="col-sm-3 col-form-label">Save downloaded</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="downloadPath">
                            </div>
                            <div class="col-sm-2">
                                <input type="button" class="btn btn-block btn-info" value="Browse" onclick="clickOpenFileDlg('downloadPath', 0);" />
                            </div>
                        </div>
                        <input type="button" class="btn" value="Get" onclick="clickGetLocalCfg();" />&nbsp;<input type="button" class="btn" value="Set" onclick="clickSetLocalCfg();" />
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <div class="row">
                            <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat" onclick="clickLogin();">{{__('Test Connection')}}</button></div>
                            <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat" onclick="clickLogout();">{{__('Stop Connection')}}</button></div>

                            <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat" onclick="clickStartRealPlay();">{{__('Live Preview')}}</button></div>
                            <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat" onclick="clickStopRealPlay();">{{__('Stop Preview')}}</button></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat" onclick="clickStartRecord('realplay');">{{__('Test Record')}}</button></div>
                            <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat" onclick="clickStopRecord('realplay');">{{__('Stop Record')}}</button></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-block btn-primary btn-flat">{{__('Save Camera')}}</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md">
                    <div class="form-group row">
                        <label for="exampleInputKodeRegion" class="col-sm-6 col-form-label">{{__('Device Info')}}</label>
                        <div class="col-sm-6">
                            <input id="ip" class="form-control sel" onchange="getChannelInfo();getDevicePort();">
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group row">
                        <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <select id="channels" class="form-control sel"></select>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group row">
                        <select id="streamtype" class="form-control sel">
                            <option value="1">Main stream</option>
                            <option value="2">Sub stream</option>
                            <option value="3">Third stream</option>
                            <option value="4">Transcode stream</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="divPlugin" class="plugin"></div>
            <br>

            <div class="row">
                <div class="col-md">
                    <fieldset class="operate">
                        <legend>Operation information</legend>
                        <div id="opinfo" class="opinfo"></div>
                    </fieldset>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
