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
                            <td>
                                <a href="{{route('dalalo.titik_delete',$t->id)}}" class="btn_hapus"><button class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><h5>Tambah Data</h5></div>
            <div class="widget-content">
                <form action="{{route('dalalo.titik_post')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_ruas" value="{{$ruas->id}}">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tabel.Kode Rambu</th>
                            <td>
                                <input type="text" name="tabel_kd" class="form-control" placeholder="(Tabel).(Kode Rambu)" value="{{old('tabel_kd')}}" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>
                                <input type="text" name="tahun" class="form-control" placeholder="Tahun Pemasangan" value="{{old('tahun')}}" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Latitude (Garis Lintang)</th>
                            <td>
                                <input type="text" name="x" class="form-control" placeholder="Titik Koordinat Lintang" value="{{old('x')}}" required> 
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Longitude (Garis Bujur)</th>
                            <td>
                                <input type="text" name="y" class="form-control" placeholder="Titik Koordinat Bujur" value="{{old('y')}}" required> 
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
 $('.select2').select2();
 $(".btn_hapus").click(function(e){
        e.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Hapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection