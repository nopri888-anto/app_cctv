@extends('layout.user_layout')

@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                <div class="form-group row">
                    <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('Regional')}}</label>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$cam->regionname}}">
                    </div>
                    <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('Branch')}}</label>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$cam->branchname}}">
                    </div>
                    <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('Outlate')}}</label>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$cam->outlatename}}">
                    </div>
                    <label for="exampleInputIdRegional" class="col-sm-1 col-form-label">{{__('ID CCTV')}}</label>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="exampleInputIdRegional" name="camid" value="{{$cam->camid}}">
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-sm-9">
                        <input type="hidden" class="form-control" id="loginip" name="camip" value="{{$cam->camip}}">
                        <input type="hidden" class="form-control" id="port" name="camport" value="{{$cam->camport}}">
                        <input type="hidden" class="form-control" id="username" name="camusername" value="{{$cam->camusername}}">
                        <input type="hidden" class="form-control" id="rtspport" name="camrtsp" value="{{$cam->camrtsp}}">
                        <input type="hidden" class="form-control" id="deviceport" name="camdeviceport" value="{{$cam->camdeviceport}}">
                        <input type="hidden" class="form-control" id="password" name="campassword" value="{{$cam->campassword}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <button type="button" class="btn-block btn-success btn-flat" onclick="clickLogin();">{{__('Connect CCTV')}}</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn-block btn-success btn-flat" onclick="clickLogout();">{{__('Stop Connection')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <select id="streamtype" class="form-control sel">
                                    <option value="1">Main stream</option>
                                    <option value="2">Sub stream</option>
                                    <option value="3">Third stream</option>
                                    <option value="4">Transcode stream</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input id="ip" type="hidden" class="form-control sel" onchange="getChannelInfo();getDevicePort();">
                                <select id="channels" class="form-control sel"></select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <fieldset class="playback">
                                <div class="form-group row ">
                                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Type Stream')}}</label>
                                    <div class="col-sm-9">
                                        <select id="record_streamtype" class="form-control sel">
                                            <option value="1">Main stream</option>
                                            <option value="2">Sub stream</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Start time')}}</label>
                                    <div class="col-sm-9">
                                        <input id="starttime" type="text" class="form-control txt" value="2013-12-10 00:00:00" />
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('End time')}}</label>
                                    <div class="col-sm">
                                        <input id="endtime" type="text" class="form-control txt" value="2013-12-11 23:59:59" />
                                    </div>
                                    <input type="button" class="btn-block btn-success btn-flat" value="Search" onclick="clickRecordSearch(0);" />
                                </div>
                                <!--<div class="form-group row ">
                                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Download Starttime')}}</label>
                                    <div class="col-sm-9">
                                        <input id="downloadstarttime" type="text" class="form-control txt" value="2013-12-10 00:00:00" />
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Download endtime')}}</label>
                                    <div class="col-sm-7">
                                        <input id="downloadendtime" type="text" class="form-control txt" value="2013-12-11 23:59:59" />

                                    </div>
                                    <input type="button" class="btn-block btn-success btn-flat" value="Download" onclick="clickStartDownloadRecordByTime();" />
                                </div>-->

                                <table width="100%" cellpadding="0" cellspacing="3" border="0">
                                    <tr>
                                        <td colspan="2">
                                            <div id="searchdiv" class="searchdiv">
                                                <table id="searchlist" class="searchlist" cellpadding="0" cellspacing="0" border="0">
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                            </fieldset>
                            <!-- <div class="row">
                                 <div class="col-md-4">
                                        <input type="button" class="btn-block btn-success btn-flat" value="Start play" onclick="clickStartPlayback();" />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" class="btn-block btn-success btn-flat" value="Stop play" onclick="clickStopPlayback();" />
                                    </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn-block btn-info btn-flat">Mulai Audit</a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="divPlugin" class="plugin"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-block bg-gradient-info">Start Audit</button>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-6">
                        <fieldset class="operate">
                            <legend>Operation information</legend>
                            <div id="opinfo" class="opinfo"></div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->



            @endsection
