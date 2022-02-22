@extends('layout.admin_layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Live Streaming
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-1"></div>
                            <label class="col-sm-1 col-form-label">{{__('Regional')}}</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" id="camregion" name="camregion" value="{{$mcams->regionname}}">
                            </div>
                            <label class="col-sm-1 col-form-label">{{__('Branch')}}</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" id="cambranch" name="cambranch" value="{{$mcams->branchname}}">
                            </div>
                            <label class="col-sm-1 col-form-label">{{__('Outlate')}}</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" id="camoutlet" name="camoutlet" value="{{$mcams->outlatename}}">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <div id="divPlugin" class="plugin"></div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <select id="streamtype" class="form-control sel">
                                    <option class="hidden" value="1">Main stream</option>
                                    <option value="2">Sub stream</option>
                                    <option value="3">Third stream</option>
                                    <option value="4">Transcode stream</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input id="ip" type="hidden" class="form-control sel" onchange="getChannelInfo();getDevicePort();">
                                <select id="channels" class="form-control sel"></select>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning mb-1" onclick="clickLogin();">{{__('Turn On')}}</button>
                                <button type="button" class="btn btn-danger mb-1" onclick="clickLogout();">{{__('Turn Off')}}</button>
                                <a href="{{route('live.audit', $mcams->camid)}}" type="btn" class="btn btn-primary mb-1">Audit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{-- <fieldset class="operate">
                            <legend>Operation information</legend>
                            <div id="opinfo" class="opinfo"></div>
                        </fieldset> --}}
                                {{-- <select id="streamtype" class="form-control sel">
                                    <option value="1">Main stream</option>
                                    <option value="2">Sub stream</option>
                                    <option value="3">Third stream</option>
                                    <option value="4">Transcode stream</option>
                                </select> --}}
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        {{-- <option value="1">Main stream</option>
                        <option value="2">Sub stream</option> --}}
                        {{-- </input> --}}
                        <input type="hidden" class="form-control" id="loginip" name="camip" value="{{$mcams->camip}}">
                        <input type="hidden" class="form-control" id="port" name="camport" value="{{$mcams->camport}}">
                        <input type="hidden" class="form-control" id="username" name="camusername" value="{{$mcams->camusername}}">
                        <input type="hidden" class="form-control" id="rtspport" name="camrtsp" value="{{$mcams->camrtsp}}">
                        <input type="hidden" class="form-control" id="deviceport" name="camdeviceport" value="{{$mcams->camdeviceport}}">
                        <input type="hidden" class="form-control" id="password" name="campassword" value="{{$mcams->campassword}}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form method="get" action="#">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-sm-4">
                                    <input type="text" name="search" id="search" placholder="Must be filled..." class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary mb-1">Find</button>
                                    <button type="reset" class="btn btn-primary mb-1">Reset</button>
                                    <a href="{{route('live.audit')}}" type="btn" class="btn btn-primary mb-1">Audit</a>
                            </div> --}}

                    </div>
                    </form>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Auditor</th>
                                <th>Date Audit</th>
                                <th>Value</th>
                                <th>Yudisium</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Test</td>
                                <td>2021</td>
                                <td>80</td>
                                <td>A</td>
                                <td>Edit</td>
                            </tr>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
</div>


@endsection
