@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Daftar Kapal</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kapal</th>
                            <th>Nama Kapal</th>
                            <th>Tujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($kapal as $k)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$k->kd_kapal}}</td>
                            <td>{{$k->nama}}</td>
                            <td>{{$k->tujuan}}</td>
                            <td>
                                <a href="{{route('kapal.detail',$k->id)}}"><button class="btn btn-info">Detail</button></a>
                                <a href="{{route('kapal.edit',$k->id)}}"><button class="btn btn-warning">Edit</button></a>
                                <a href="{{route('kapal.delete',$k->id)}}"><button class="btn btn-danger">Hapus</button></a>
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
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Tambah Data</h5>
              </div>
              <div class="widget-content">
                
              <form action="{{route('kapal.post')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Kapal</th>
                            <td>
                                <input type="text" name="kd_kapal" class="form-control" value="{{old('kd_kapal')}}" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Kapal</th>
                            <td>
                                <input type="text" name="nama" class="form-control" value="{{old('nama')}}" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>
                                <input type="text" name="tujuan" class="form-control" value="{{old('tujuan')}}" required> 
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
@endsection