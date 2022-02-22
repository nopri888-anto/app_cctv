@extends('layout.admin_layout')

@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                <form method="get" action="#">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" name="search" id="search" placholder="Must be filled..." class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary mb-1">Find</button>
                            <button type="reset" class="btn btn-primary mb-1">Reset</button>
                        </div>
                        <div class="col-sm">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Nama Pegawai</th>
                            <th>Wilayah</th>
                            <th>Cabang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Teller</td>
                            <td>Dayu</td>
                            <td>Jakarta Kota</td>
                            <td>Daan Mogot</td>
                            <td>
                                <a href="#" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
