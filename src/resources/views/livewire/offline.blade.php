<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md">
        <div class="form-group row ">
            <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Wilayah')}}</label>
            <div class="col-sm-9">
                <select class="form-control" name="mregion" id="mregion" wire:model="selectedMregion">
                    <option>-- Pilih Regional --</option>
                    @foreach($mregions as $value)
                    <option value="{{$value->id}}">{{$value->regionname}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">{{$selectedMregion}}</div>
</div>
