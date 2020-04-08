@extends('layouts.admin')

@section('content')
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Galeri Foto</h5>
          </div>
          <div class="widget-content">
          <h5>Tambah Foto</h5>
           <form action="{{route('galeri.post')}}" method="post" enctype="multipart/form-data">
              @csrf
               <div class="controls">
                  <input type="hidden" name="id_berita" value="{{$id}}">
                  <input type="hidden" name="title" value="{{$berita->title}}">
                  <input type="file" name="path">
                  @if($errors->has('path'))
                    <div class="alert alert-error">
                        {{$errors->first('path')}}
                    </div>
                  @endif
               </div>
               <div class="controls" style="margin-top:10px">
                   <button class="btn btn-primary" type="submit">Kirim</button>
               </div>
           </form>
           <hr>
            @if($galeri->count()==0)
            <span class="badge badge-warning">Belum ada foto</span>
            @endif
            <ul class="thumbnails">
             @foreach($galeri as $g)
              <li class="span2"> <a> <img src="{{asset('img/'.$g->path)}}" alt="" > </a>
                <div class="actions"> <a title="" class="" href="{{route('galeri.delete',$g->id)}}"><i class="icon-trash"></i></a> <a class="lightbox_trigger" href="{{asset('img/'.$g->path)}}"><i class="icon-picture"></i></a> </div>
              </li>
              @endforeach
            </ul>
            <a href="{{route('berita.index')}}"><button class="btn" style="margin-top:15px">Kembali</button></a>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection