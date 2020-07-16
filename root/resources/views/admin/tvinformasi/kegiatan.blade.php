@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                <h5>Kegiatan</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                      ?>
                      @foreach($kegiatan as $k)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$k->kegiatan}}</td>
                          <td>{{$k->date}}</td>
                          <td>{{$k->keterangan}}</td>
                          <td></td>
                          <td>
                            <a href="{{route('tvinformasi.kegiatan_edit',$k->id)}}"><button class="btn btn-warning btn-mini">Edit</button></a>
                            <a href="{{route('tvinformasi.kegiatan_delete',$k->id)}}"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
                    <form action="{{route('tvinformasi.kegiatan_post')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Kegiatan</th>
                                <td>
                                    <input type="text" name="kegiatan" class="form-control" value="{{old('kegiatan')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <td>
                                    <input type="date" name="date" class="form-control" value="{{old('date')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="keterangan" class="form-control" value="{{old('keterangan')}}"> 
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