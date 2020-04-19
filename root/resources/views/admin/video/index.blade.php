@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-film"></i> </span>
              <h5>Daftar Video</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>ID Video Youtube</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($video as $v)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->video_path}}</td>
                            <td>
                                <a href="{{route('video.edit',$v->id)}}"><button class="btn btn-primary">Edit</button></a>
                                <a href="{{route('video.delete',$v->id)}}"><button class="btn btn-danger">Hapus</button></a>
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
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
               <form action="{{route('video.post')}}" method="post">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Nama / Judul</th>
                        <td>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>ID Video Youtube</th>
                        <td>
                            <input type="text" name="video_path" class="form-control" value="{{old('video_path')}}" placeholder="Contoh : ovFPKu00cCc" required> 
                        </td>
                        <div class="alert alert-info">
                        <button class="close" data-dismiss="alert">×</button>
                        Contoh ID Video Youtube https://www.youtube.com/watch?v=<b>ovFPKu00cCc</b></div>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection