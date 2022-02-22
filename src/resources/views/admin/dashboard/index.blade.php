@extends('layout.admin_layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Dashboard')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <div class="form-group row">
                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Wilayah')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="mregionfk">
                            <option value="">{{__('--Regional--')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group row">
                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Cabang')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="mregionfk">
                            <option value="">{{__('--Regional--')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group row">
                    <label for="exampleInputKodeRegion" class="col-sm-3 col-form-label">{{__('Outlet')}}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="mregionfk">
                            <option value="">{{__('--Regional--')}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
            
        <br>
        <div class="row">
            <div class="col-md">
                <div class="alert alert-default-warning alert-dismissible fade show" role="alert">
                    <p style="color: black; font-size:18px; text-align:center;">SCORE OVERALL : 83.00</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card-body">
                    <div class="chart">
                      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Wilayah</th>
                            <th>Score Wilayah</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Jakarta</td>
                            <td>70</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("barChart").getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jakarta Kota","BSD","SENAYAN","KEMAYORAN"],
        datasets: [{
        label: '',
        backgroundColor: [
            'rgba(255, 206, 86)',
            'rgba(75, 192, 192)',
            'rgba(153, 102, 255)',
            'rgba(255, 159, 64)'
        ],
        borderColor: [
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        data: [90,90,90,90]
        }],
        options: {
    animation: {
        onProgress: function(animation) {
            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
        }
      }
    }
   },
 });
</script>
@endsection
