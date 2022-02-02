@extends('layout.admin_layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        Add Item Parameter
    </div>
    <div class="card-body">
        <form action="{{route('scorecarditem.search')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-2 col-form-label">{{__('Scorename')}}</label>
                <div class="col-md-5">
                    <select class="form-control" name="scorecardname" id="scorecardname">
                        <option value="">{{__('--Scorename--')}}</option>
                        @foreach($mscorecard as $value)
                        <option value="{{$value->id}}">{{$value->scorecarname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">{{__('Aspek')}}</label>
                <div class="col-md-5">
                    <select class="form-control" name="aspek" id="aspek">
                        <option value="">{{__('--Aspek--')}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label"></label>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">{{__('Add Item')}}</button>
                </div>
            </div>

        </form>
        <div class="row">
            <div class="col-md-7">
                <table id="parameter" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{__('Save Item')}}</button>
    </div>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {

        // Position Change
        $('#scorecardname').change(function() {

            // Position id
            var id = $(this).val();

            // // Empty the dropdown
            // $('#aspekname').find('option').not(':first').remove();

            $('#aspek').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/scorecarditem/getScoreCardName/' + id
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

                            var id = response['data'][i].id;
                            var aspek = response['data'][i].aspectname;

                            var option = "<option value='" + id + "'>" + aspek + "</option> ";
                            //var option2 = "<tr><td value='" + id + "'>" + aspek + "</td> <td><div id='dynamic_field'><textarea class='form-control' rows='2' name='item[]' ></textarea> </div></td></tr>";

                            $("#aspek").append(option);
                            //$("#parameter").append(option2);
                        }
                    }

                }
            });
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;

        $('#add_form').click(function() {
            i++;
            $('#scoretabel').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="col-sm-9"></div></td><td><textarea class="form-control" name="item[]" rows="2" ></textarea><input type="hidden" class="form-control" id="itemid" value="174" name="itemid[]"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

</script>
