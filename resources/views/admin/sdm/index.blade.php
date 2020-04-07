@extends('layouts/admin')

@section('content')
    @foreach($satpel as $sp)
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                <h5>{{$sp->nama}}</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pangkat (Golongan)</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                        $sumberdaya = App\Sdm::where('satpel',$sp->id)->get();
                      ?>
                      @foreach($sumberdaya as $sdm)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$sdm->nama}}</td>
                          <td>{{$sdm->pangkat}}</td>
                          <td>{{$sdm->jabatan}}</td>
                          <td>
                              <a href="{{route('sdm.edit',$sdm->id)}}"><button class="btn btn-info">Edit</button></a>
                              <a href="{{route('sdm.delete',$sdm->id)}}"><button class="btn btn-danger">Hapus</button></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    <div class="row-flui">
        <div class="span12">
            <a href="{{route('sdm.add')}}?satpel={{$sp->id}}"><button class="btn btn-success">Tambah</button></a>
        </div>
    </div>
    @endforeach
@endsection