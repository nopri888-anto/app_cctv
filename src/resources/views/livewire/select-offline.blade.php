<div class="row">
    <div class="col-md">
        <div class="form-group row ">
            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Regional')}}</label>
            <div class="col-sm-9">
                <select class="form-control" name="regional" id="regional">
                    <option value='0'>-- Pilih Regional --</option>
                    @foreach($mregions['data'] as $region)
                    <option value="{{$region->id}}">{{$region->regionname}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="form-group row ">
            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Mbranch')}}</label>
            <div class="col-sm-9">
                <select class="form-control" name="branch" id="branch">
                    <option value="0">-- Pilih Branch --</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="form-group row ">
            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Outlet')}}</label>
            <div class="col-sm-9">
                <select class="form-control" name="outlet" id="outlet">
                    <option value="0">-- Pilih Outlet --</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="form-group row ">
            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Kamera')}}</label>
            <div class="col-sm-9">
                <select class="form-control" name="camera" id="camera">
                    <option value="0">-- Pilih CCTV --</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <a href="{{ route('offline.show') }}" class="btn btn-info">Pilih CCTV</a>
    </div>
    <div class="col-md"></div>
    <div class="col-md"></div>
</div>
