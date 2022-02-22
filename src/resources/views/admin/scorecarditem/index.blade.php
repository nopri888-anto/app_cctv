@extends('layout.admin_layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
    <h3 class="card-title"><a href="{{route('scorecarditem.create')}}" class="btn btn-success">{{__('Add Item Parameter')}}</a></h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>No</th>
                <th>Score Name</th>
                <th>Item Paramter</th>
                <th>Aspek</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mscorecarditems as $key => $mscoredcarditem)
            <tr>
                <td>
                    <div class="form-group clearfix row">
                        <div class="custom-control icheck-primary d-inline">
                            <input type="checkbox" name="aspekfk[]" class="" >
                        </div>
                    </div>
                </td>
                <td>{{$key+1}}</td>
                <td>{{$mscoredcarditem->id}}</td>
                <td>{{$mscoredcarditem->item}}</td>
                <td>{{$mscoredcarditem->mscorecardaspectfk}}</td>
                <td>
                    <a href="{{route('scorecarditem.edit', $mscoredcarditem->id)}}" class="btn btn-warning"><i class="fas fa-edit nav-icon"></i></a>
                    <a href="{{route('scorecarditem.delete', $mscoredcarditem->id) }}" class="btn btn-danger"><i class="fas fa-trash nav-icon"></i></a></td>
                </td>
            </tr>
            @endforeach
    </table>
</div>
<!-- /.card-body -->
@include('sweetalert::alert')
@endsection
