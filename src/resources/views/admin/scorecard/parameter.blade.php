@extends('layout.admin_layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('scorecard.storeitem', )}}">
            @csrf
            <div class="card card-outline card-primary">
                <div class="card-header">
                    Detail Scorecardname
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @foreach($mscorecardaspect as $key => $value)
                            <div class="form-group row">
                                <label for="exampleInputIdRegional" class="col-sm-2 col-form-label">{{__('Scorename')}}</label>
                                <div class="col-sm-6">
                                    <input type="text" disabled class="form-control" value="{{$value->scorecarname}}" name="scorecarname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputIdRegional" class="col-sm-2 col-form-label">{{__('Aspek')}}</label>
                                <div class="col-sm-6">
                                    <input type="text" disabled class="form-control" value="{{$value->aspectname}}" name="aspectname">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">


                            <table id="table_item" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mscorecarditems as $key => $item)
                                    <tr>
                                        <td>
                                            <textarea class="form-control" rows="2">{{$item->item}}</textarea>
                                            <input type="text" hidden class="form-control" value="{{$value->id}}">
                                        </td>
                                        <td>
                                            <a href="{{route('scorecard.destroyitemparameter',$item->id)}}" title="Delete Item" class="btn btn-danger"><i class="fas fa-trash nav-icon"></i></a></td>
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" title="Back Menu" class="btn btn-info"><i class="fas fa-long-arrow-alt-left nav-icon"></i></a></td>
                    <button type="button" name="add" id="add" class="btn btn-success" title="Add Item Field"><i class="fas fa-plus nav-icon"></i></button>
                    <button type="submit" class="btn btn-primary" title="Save Item Field"><i class="fas fa-save nav-icon"></i></button>
                </div>
            </div>
    </div>
    </form>
</div>
@include('sweetalert::alert')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#table_item').append('<tr id="row' + i + '" class="table_item"><td><textarea class="form-control" name="item[]" rows="2" ></textarea><input type="text" hidden class="form-control" value="{{$value->id}}" name="idmscorecardaspect[]"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

</script>
@endsection
