@extends('layout.admin_layout')

@section('content')

<div class="row">
    {{-- <div class="col-md">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Appearance(Penampilan)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Attitude(Sikap)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Skill(Keahlian)</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="exampleInputIdRegional" class="col-sm-2 col-form-label">{{__('Employee Name')}}</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="exampleInputIdRegional" name="camid">
    </div>
</div>
<div class="form-group row">
    <label for="exampleInputKodeRegion" class="col-sm-2 col-form-label">{{__('Employee')}}</label>
    <div class="col-sm-6">
        <select class="form-control" name="moutletfk">
            @foreach($mscore as $item)
            <option value="{{$item->id}}">{{$item->)}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>
<div class="col-md-6">
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Parameter</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>
    </div>
    <div class="col-md-6">
        asa
    </div>
</div>
</div>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div>
<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3</div>
</div>
</div>
</div>
</div> --}}
</div>


@endsection
