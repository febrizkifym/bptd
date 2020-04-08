@extends('layouts/admin')
<?php
    use Illuminate\Support\Str; 
?>
@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-paper-clip"></i> </span>
              <h5>Postingan Berita</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal Posting</th>
                            <th>Gambar</th>
                            <th>Jumlah Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($berita as $b)
                        <?php
                            $foto = App\Galeri::where('id_berita',$b->id)->count();
                        ?>
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$b['title']}}</td>
                            <td>
                                @if($b['public'])
                                    {{$b['created_at']}}
                                @else
                                    <center>
                                      <span class="badge badge-warning">Belum diposting</span>
                                    </center>
                                @endif
                            </td>
                            <td>
                                @if($b['thumbnail'])
                                 <center>
                                  <span class="badge badge-success"><i class="icon-ok"></i></span>
                                 </center>
                                @else
                                    <center>
                                      <span class="badge badge-important"><i class="icon-remove"></i></span>
                                    </center>
                                @endif
                            </td>
                            <td>
                                {{$foto}}
                            </td>
                            <td>
                                <center>
                                    <a href="{{route('single',[$b->id,Str::slug($b->title,'-')])}}"><button class="btn btn-mini btn-primary">Lihat Postingan</button></a>
                                    <a href="{{route('galeri.detail',$b->id)}}"><button class="btn btn-mini btn-info">Lihat Album</button></a>
                                    <a href="{{route('berita.edit',$b['id'])}}"><button class="btn btn-mini btn-warning">Edit</button></a>
                                    <a href="{{route('berita.delete',$b['id'])}}"><button class="btn btn-mini btn-danger">Hapus</button></a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <a href="{{route('berita.add')}}"><button class="btn btn-success">Buat Postingan Baru</button></a>
        </div>
    </div>
@endsection