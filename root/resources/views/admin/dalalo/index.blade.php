@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-warning-sign"></i> </span>
              <h5>Daftar Titik</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Tabel.Kode Rambu</th>
                            <th rowspan="2">Tahun Perolehan</th>
                            <th rowspan="2">Lokasi/Ruas Jalan</th>
                            <th colspan="2">Titik Koordinat</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>N</th>
                            <th>E</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($titik as $t)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$t->tabel_kd}}</td>
                            <td>{{$t->tahun}}</td>
                            <td>{{$t->nama}}</td>
                            <td>{{$t->x}}</td>
                            <td>{{$t->y}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
    </div>
@endsection