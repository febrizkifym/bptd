@extends('layouts/admin')

@section('content')
<div class="row-fluid">
        <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-arrow-up"></i> </span>
            <h5>Daftar Ruas</h5>
            </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Daerah</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($ruas as $r)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$r->nama}}</td>
                        <td>{{$r->daerah}}</td>
                        <td>{{$r->kecamatan}}</td>
                        <td>
                            <a href="{{route('dalalo.ruas_detail',$r->id)}}"><button class="btn btn-info">Detail</button></a>
                            <a href="{{route('dalalo.ruas_delete',$r->id)}}"><button class="btn btn-danger">Hapus</button></a>
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
                <form action="{{route('dalalo.ruas_post')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Ruas</th>
                            <td>
                                <input type="text" name="nama" class="form-control" value="{{old('nama')}}"> 
                            </td>
                        </tr>
                        <tr>
                            <th>Daerah</th>
                            <td>
                                <input type="text" name="daerah" class="form-control" placeholder="Kabupaten/Kota ..." value="{{old('daerah')}}"> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>
                                <input type="text" name="kecamatan" class="form-control" value="{{old('kecamatan')}}"> 
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