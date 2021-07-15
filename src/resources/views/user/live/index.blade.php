
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
    <fieldset class="localconfig">
        <legend>Local configuration</legend>
        <table cellpadding="0" cellspacing="3" border="0">
            <tr>
                <td class="tt">Play performance</td>
                <td>
                    <select id="netsPreach" name="netsPreach" class="sel">
                        <option value="0">Shortest delay</option>
                        <option value="1">Real-time</option>
                        <option value="2">Balance</option>
                        <option value="3">Smooth</option>
                    </select>
                </td>
                <td class="tt">Image size</td>
                <td>
                    <select id="wndSize" name="wndSize" class="sel">
                        <option value="0">Full</option>
                        <option value="1">4:3</option>
                        <option value="2">16:9</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="tt">Rules</td>
                <td>
                    <select id="rulesInfo" name="rulesInfo" class="sel">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </td>
                <td class="tt">Snapshot format</td>
                <td>
                    <select id="captureFileFormat" name="captureFileFormat" class="sel">
                        <option value="0">JPEG</option>
                        <option value="1">BMP</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="tt">Package size</td>
                <td>
                    <select id="packSize" name="packSize" class="sel">
                        <option value="0">256M</option>
                        <option value="1">512M</option>
                        <option value="2">1G</option>
                    </select>
                </td>
                <td class="tt">Protocol</td>
                <td>
                    <select id="protocolType" name="protocolType" class="sel">
                        <option value="0">TCP</option>
                        <option value="2">UDP</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="tt">Save record files to</td>
                <td colspan="3"><input id="recordPath" type="text" class="txt2" />&nbsp;<input type="button" class="btn" value="Browse" onclick="clickOpenFileDlg('recordPath', 0);" /></td>
            </tr>
            <tr>
                <td class="tt">Save downloaded files to</td>
                <td colspan="3"><input id="downloadPath" type="text" class="txt2" />&nbsp;<input type="button" class="btn" value="Browse" onclick="clickOpenFileDlg('downloadPath', 0);" /></td>
            </tr>
            <tr>
                <td class="tt">Save snapshots in live view to</td>
                <td colspan="3"><input id="previewPicPath" type="text" class="txt2" />&nbsp;<input type="button" class="btn" value="Browse" onclick="clickOpenFileDlg('previewPicPath', 0);" /></td>
            </tr>
            <tr>
                <td class="tt">Save snapshots when playback to</td>
                <td colspan="3"><input id="playbackPicPath" type="text" class="txt2" />&nbsp;<input type="button" class="btn" value="Browse" onclick="clickOpenFileDlg('playbackPicPath', 0);" /></td>
            </tr>
            <tr>
                <td class="tt">Save clips to</td>
                <td colspan="3"><input id="playbackFilePath" type="text" class="txt2" />&nbsp;<input type="button" class="btn" value="Browse" onclick="clickOpenFileDlg('playbackFilePath', 0);" /></td>
            </tr>
            <tr>
                <td class="tt">Save device snapshots to</td>
                <td colspan="3"><input id="devicePicPath" type="text" class="txt2" />&nbsp;<input type="button" class="btn" value="Browse" onclick="clickOpenFileDlg('devicePicPath', 0);" /></td>
            </tr>
            <tr>
                <td colspan="4"><input type="button" class="btn" value="Get" onclick="clickGetLocalCfg();" />&nbsp;<input type="button" class="btn" value="Set" onclick="clickSetLocalCfg();" /></td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="left">
    <fieldset class="preview">
        <legend>Browse</legend>
        <table cellpadding="0" cellspacing="3" border="0">
            <tr>
                <td class="tt">Stream type</td>
                <td>
                    <select id="streamtype" class="sel">
                        <option value="1">Main stream</option>
                        <option value="2">Sub stream</option>
                        <option value="3">Third stream</option>
                        <option value="4">Transcode stream</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="tt">Volume</td>
                <td>
                    <input type="text" id="volume" class="txt" value="50" maxlength="3" />&nbsp;<input type="button" class="btn" value="Set" onclick="clickSetVolume();" />(Range：0~100)
                </td>
                <td>
                    <input type="button" class="btn" value="Audio On" onclick="clickOpenSound();" />
                    <input type="button" class="btn" value="Audio Off" onclick="clickCloseSound();" />
                </td>
            </tr>
            <tr>
                <td class="tt">Voice channel</td>
                <td>
                    <select id="audiochannels" class="sel">
                        
                    </select>
                    <input type="button" class="btn" value="Get channel" onclick="clickGetAudioInfo();" />
                </td>
                <td>
                    <input type="button" class="btn" value="Voice Talk" onclick="clickStartVoiceTalk();" />
                    <input type="button" class="btn" value="Stop Voice Talk" onclick="clickStopVoiceTalk();" />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="button" class="btn2" value="Capture" onclick="clickCapturePic();" />
                    <input type="button" class="btn" value="capture onload" onclick="clickCapturePicData();" />
                    <input type="button" class="btn2" value="Start recording" onclick="clickStartRecord('realplay');" />
                    <input type="button" class="btn2" value="Stop recording" onclick="clickStopRecord('realplay');" />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="button" class="btn2" value="Enable E zoom" onclick="clickEnableEZoom();" />
                    <input type="button" class="btn2" value="Disable E zoom" onclick="clickDisableEZoom();" />
                    <input type="button" class="btn2" value="Enable 3D zoom" onclick="clickEnable3DZoom();" />
                    <input type="button" class="btn2" value="Disable 3D zoom" onclick="clickDisable3DZoom();" />
                    <input type="button" class="btn2" value="Full screen" onclick="clickFullScreen();" />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Resolution:<input id="resolutionWidth" type="text" class="txt" /> x <input id="resolutionHeight" type="text" class="txt" />
                    <input type="button" class="btn2" value="Device capture" onclick="clickDeviceCapturePic();" />
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset class="draw">
        <legend>drawing</legend>
        <table cellpadding="0" cellspacing="3" border="0">
            <tr>
                <td>
                    <input type="button" class="btn2" value="Enable drawing" onclick="clickEnableDraw();" />
                    <input type="button" class="btn2" value="Disable drawing" onclick="clickDisableDraw();" />
                </td>
            </tr>
            <tr>
                <td>
                    Graph ID：<input id="snapId" type="text" class="txt" />
                    Name：<input id="snapName" type="text" class="txt" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" class="btn2" value="Add the graph" onclick="clickAddSnapPolygon()" />
                    <input type="button" class="btn2" value="Delete the graph" onclick="clickDelSnapPolygon()" />
                    <input type="button" class="btn2" value="Edit the graph" onclick="clickEditSnapPolygon()" />
                    <input type="button" class="btn2" value="Stop editing" onclick="clickStopSnapPolygon()" />
                    <input type="button" class="btn2" value="Get the graph" onclick="clickGetSnapPolygon()" />
                    <input type="button" class="btn2" value="Set the graph" onclick="clickSetSnapPolygon()" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" class="btn2" value="Clear the graph" onclick="clickDelAllSnapPolygon()" />
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


