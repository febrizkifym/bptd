@extends('layouts/admin')

@section('content')
<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Tabel Satuan Pelayanan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Satpel</th>
                    <th>Alamat</th>
                    <th>Tupoksi</th>
                    <th>Struktur</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                 <tr>
                  @foreach($satpel as $sp)
                  <td>{{$sp->id}}</td>
                  <td>{{$sp->nama}}</td>
                  <td>
                          @if($sp->alamat)
                          {{$sp->alamat}}
                          @else
                     <center>
                          <span class="badge badge-important"><i class="icon-remove"></i></span>
                     </center>
                          @endif
                  </td>
                  <td>
                     <center>
                          @if($sp->tupoksi)
                          <span class="badge badge-success"><i class="icon-ok"></i></span>
                          @else
                          <span class="badge badge-important"><i class="icon-remove"></i></span>
                          @endif
                     </center>
                  </td>
                  <td>
                     <center>
                          @if($sp->struktur)
                          <span class="badge badge-success"><i class="icon-ok"></i></span>
                          @else
                         <span class="badge badge-important"><i class="icon-remove"></i></span>
                          @endif
                     </center>
                  </td>
                  <td>
                     <center>
                          @if($sp->gambar)
                          <span class="badge badge-success"><i class="icon-ok"></i></span>
                          @else
                         <span class="badge badge-important"><i class="icon-remove"></i></span>
                          @endif
                     </center>
                  </td>
                  <td>
                     <center>
                          <a href="{{route('satpel.detail',$sp->id)}}"><button class="btn btn-info">Detail</button></a>
                     </center>
                  </td>
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
<div class="row-flui">
    <div class="span12">
        <a href="{{route('satpel.add')}}"><button class="btn btn-success">Tambah</button></a>
    </div>
</div>
@endsection