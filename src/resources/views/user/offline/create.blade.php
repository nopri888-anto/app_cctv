@extends('layout.admin_layout')

@section('content')

<div class="row">
    <div class="col-md">
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
                                    <label for="exampleInputKodeRegion" class="col-sm-2 col-form-label">{{__('Scorecard name')}}</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="scorecardname" id="scorecardname">
                                            <option value="">{{__('-- Scorecard name --')}}</option>
                                            @foreach($mscore as $item)
                                            <option value="{{$item->id}}">{{$item->scorecarname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="exampleInputIdRegional" class="col-sm-2 col-form-label">{{__('Outlate')}}</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$cam->outlatename}}" class="form-control" id="exampleInputIdRegional" name="camid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table id="example1" name="tableparameter" class="table table-bordered table-striped">
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
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <p>Total Aspek Penilian</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="exampleInputIdRegional" name="score">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <p>Yudisium</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="exampleInputIdRegional" name="yudisium">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="divPlugin" class="plugin"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <table id="example1" name="tableparameter" class="table table-bordered table-striped">
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
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <p>Total Aspek Penilian</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="exampleInputIdRegional" name="score">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <p>Yudisium</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="exampleInputIdRegional" name="yudisium">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                test
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <table id="example1" name="tableparameter" class="table table-bordered table-striped">
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
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <p>Total Aspek Penilian</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="exampleInputIdRegional" name="score">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <p>Yudisium</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="exampleInputIdRegional" name="yudisium">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                test
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select[name="scorecardname"]').on('change', function() {
            var aspekID = jQuery(this).val();
            if (aspekID) {
                jQuery.ajax({
                    url: '/offline/getItemAspek/' + aspekID
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
                        console.log(data);
                        jQuery('table[name="tableparameter"]').empty();
                        jQuery.each(data, function(key, value) {
                            $('table[name="tableparameter"]').append('<tr><td value="' + key + '">' + value + '</td></tr>');
                        });
                    }
                });
            } else {
                $('table[name="tableparameter"]').empty();
            }
        });
    });

</script>
