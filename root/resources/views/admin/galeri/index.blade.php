@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
              <h5>Daftar Kegiatan</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($berita as $b)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$b->title}}</td>
                            <td>{{$b->created_at}}</td>
                            <td>
                                <a href="{{route('galeri.detail',$b->id)}}"><button class="btn btn-primary">Lihat Album</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
    </div>
@endsection