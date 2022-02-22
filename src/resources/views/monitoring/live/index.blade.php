@extends('layout.user_layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="left">
            <div id="divPlugin" class="plugin"></div>
            <fieldset class="login">
                <legend>Login</legend>
                <table cellpadding="0" cellspacing="3" border="0">
                    <tr>
                        <td class="tt">IP address</td>
                        <td><input id="loginip" type="text" class="txt" value="172.7.31.111" /></td>
                        <td class="tt">Port</td>
                        <td><input id="port" type="text" class="txt" value="80" /></td>
                    </tr>
                    <tr>
                        <td class="tt">User name</td>
                        <td><input id="username" type="text" class="txt" value="admin" /></td>
                        <td class="tt">Password</td>
                        <td><input id="password" type="password" class="txt" value="Admin12345" /></td>
                    </tr>
                    <tr>
                        <td class="tt">Device port</td>
                        <td colspan="2"><input id="deviceport" type="text" class="txt" />（optional）</td>
                        <td>
                            Split screen&nbsp;
                            <select class="sel2" onchange="changeWndNum(this.value);">
                                <option value="1" selected>1x1</option>
                                <option value="2">2x2</option>
                                <option value="3">3x3</option>
                                <option value="4">4x4</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tt">RTSP port</td>
                        <td colspan="3"><input id="rtspport" type="text" class="txt" />（optional）</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <input type="button" class="btn" value="Login" onclick="clickLogin();" />
                            <input type="button" class="btn" value="Logout" onclick="clickLogout();" />
                            <input type="button" class="btn2" value="Get basic info" onclick="clickGetDeviceInfo();" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tt">Logined devices</td>
                        <td>
                            <select id="ip" class="sel" onchange="getChannelInfo();getDevicePort();"></select>
                        </td>
                        <td class="tt">Channel list</td>
                        <td>
                            <select id="channels" class="sel"></select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="btn2" value="Start preview" onclick="clickStartRealPlay();" />
                        </td>
                        <td>
                            <input type="button" class="btn2" value="Stop preview" onclick="clickStopRealPlay();" />
                        </td>
                        <td>
                            <input type="button" class="btn2" value="set osd" onclick="setTextOverlay();" />
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset class="ipchannel">
                <legend>Digital channel</legend>
                <table width="100%" cellpadding="0" cellspacing="3" border="0">
                    <tr>
                        <td><input type="button" class="btn" value="Get digital channel list" onclick="clickGetDigitalChannelInfo();" /></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="digitaltdiv">
                                <table id="digitalchannellist" class="digitalchannellist" cellpadding="0" cellspacing="0" border="0"></table>
                            </div>
                        </td>
                    </tr>
                </table>
            </fieldset>

        </div>
        <div class="left">
            <fieldset class="preview">
                <legend>Browse</legend>
                <table cellpadding="0" cellspacing="3" border="0">
                    <tr>
                        <td colspan="3">
                            <input type="button" class="btn2" value="Start recording" onclick="clickStartRecord('realplay');" />
                            <input type="button" class="btn2" value="Stop recording" onclick="clickStopRecord('realplay');" />
                        </td>
                    </tr>
                </table>
            </fieldset>


        </div>
        <div class="left">
            <fieldset class="operate">
                <legend>Operation information</legend>
                <div id="opinfo" class="opinfo"></div>
            </fieldset>
            <fieldset class="callback">
                <legend>Event callback information</legend>
                <div id="cbinfo" class="cbinfo"></div>
            </fieldset>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>

@endsection
