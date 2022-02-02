@extends('layout.admin_layout')

@section('content')

<div class="row">
    <div class="col-md">
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
        <div class="card">
            <div class="card-header">
                Audit Streaming
            </div>
            <div class="card-body">
                
                <form method="POST" action="{{route('live.saveaudit')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{__('Employee Name')}}</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" autofocus name="employee">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{__('Score Card Name')}}</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="scorecardname" id="scorecardname">
                                        <option value="">{{__('-- Scorecard name --')}}</option>
                                        @foreach($mscorecards as $item)
                                        <option value="{{$item->id}}">{{$item->scorecarname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{__('Outlet')}}</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" disabled value="{{$mcam->outlatename}}" name="outlet">
                                    <input type="text" hidden class="form-control" value="{{$mcam->mid}}" name="idoutlet" id="idoutlet">
                                    <input type="text" hidden class="form-control" value="{{$mcam->id}}" name="idcam" id="idcam">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                               <li></li>
                            </ul>
                              
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <label class="col-md-5 col-form-label">{{__('Total Nilai')}}</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="total" id="total">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <label class="col-md-5 col-form-label">{{__('Yudisium')}}</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="yudisiumscore" id="yudisiumscore">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{__('Save Audit')}}</button>
            </div>

            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {
        // Position Change
        $('#scorecardname').change(function() {
            // Position id
            var id = $(this).val();
            // Empty the dropdown
            $('#myTab').find('li').not(':first').remove();
            // AJAX request 
            $.ajax({
                url: '/live/getItemPosition/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }
                    if (len > 0) {
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {
                            // var idaspek = response['data'][i].idaspek;
                            // var item = response['data'][i].item;
                            var aspectname = response['data'][i].aspectname;
                            // var idmscorecards = response['data'][i].idmscorecards;

                            var option = "<li class='nav-item'><a class='nav-link active' id='home-tab' data-toggle='tab' href='#"+aspectname+"' role='tab' aria-controls='home' aria-selected='true'>"+aspectname+"</a></li> <div class='tab-content' id='myTabContent'><div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'></div></div>";
                            //var option = "<tr><td>" + aspectname + " <input type='text' hidden value='" + idaspek + "' name='idaspek[]' class='form-control skill col-md' /></td><td >" + item + "</td><td><input type='text' value='0' class='form-control nilaiitem col-md' name='nilaiitem[]' id='nilaiitem' onKeyUp='resultscore();' /></td></tr>";
                            //var option = "<li class='{{ '" + idaspek + "' }}'><a class='nav-link' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>" + aspectname + "</a></li>";

                            $("#myTab").append(option);
                        }
                    }
                }
            });
        });
    });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function copy_value_text_box() {
        document.getElementById('skillscore').value = document.getElementById('bobot').value;
    }

    function copy_value_text_box_attitude() {
        document.getElementById('attitudescore').value = document.getElementById('bobotattitude').value;
    }

    function copy_value_text_box_appareance() {
        document.getElementById('appereancescore').value = document.getElementById('bobotappereance').value;
    }

    function copy_value_text_box_employeename() {
        document.getElementById('employee').value = document.getElementById('employeename').value;
    }

</script>

<script>
    function resultscore() {
        var result = 0;
        $(".nilaiitem").each(function() {
            var get_text_value = $(this).val();

            if ($.isNumeric(get_text_value)) {
                result += parseFloat(get_text_value);
            }
        });
        var n = result / $(".nilaiitem").length;
        var rounding = n.toFixed(0);
        $("#total").val(rounding);

        var yudisium;
        if (rounding >= 0 && rounding <= 69) {
            yudisium = "BAD";
        } else if (rounding >= 70 && rounding <= 79) {
            yudisium = "FAIR";
        } else if (rounding >= 80 && rounding <= 89) {
            yudisium = "GOOD";
        } else if (rounding >= 90 && rounding <= 99) {
            yudisium = "EXCELLENT";
        } else {
            yudisium = "PERFECT";
        }

        $("#yudisiumscore").val(yudisium);
    }

    $(document).ready(function() {
        $(".nilaiitem").keyup(function() {
            resultscore();
        })
    });

</script>
@endsection
