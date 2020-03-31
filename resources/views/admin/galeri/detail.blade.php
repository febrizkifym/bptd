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
           <form action="{{route('dd')}}" method="post" enctype="multipart/form-data">
              @csrf
               <div class="controls">
                   <input type="file" name="filename[]">
               </div>
               <div class="controls">
                   <button class="btn btn-primary" type="submit">Kirim</button>
               </div>
           </form>
           <hr>
            <ul class="thumbnails">
             @foreach($galeri as $g)
              <li class="span2"> <a> <img src="{{url('storage/img/'.$g->filename)}}" alt="" > </a>
                <div class="actions"> <a title="" class="" href="{{route('galeri.delete',$g->id)}}"><i class="icon-trash"></i></a> <a class="lightbox_trigger" href="{{url('storage/img/'.$g->filename)}}"><i class="icon-picture"></i></a> </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection