@extends('layouts/admin')

@section('content')
<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
          <h5>Konten</h5>
          </div>
          <div class="widget-content">
            <div class="control-group">
                <form method="post" action="{{route('berita.post')}}" enctype="multipart/form-data">
                  @csrf
                   <div class="controls">
                       <label for="title">Judul Berita/Kegiatan</label>
                       <input type="text" name="title" class="span12" required>
                       
                            @if($errors->has('title'))
                            <div class="alert alert-error">
                                {{$errors->first('title')}}
                            </div>
                            @endif
                   </div>
                   <div class="controls">
                       <label for="thumbnail">Gambar</label>
                       <input type="file" name="thumbnail" required>
                            @if($errors->has('thumbnail'))
                            <div class="alert alert-error">
                                {{$errors->first('thumbnail')}}
                            </div>
                            @endif
                   </div>
                   <hr>
                    <div class="controls">
                        <textarea class="span12" id="post" name="content" rows="6" placeholder=""></textarea>
                        <hr>
                            @if($errors->has('content'))
                            <div class="alert alert-error">
                                {{$errors->first('content')}}
                            </div>
                            @endif
                    </div>
                    <div class="controls">
                        <button class="btn btn-primary" type="submit">Simpan & Kirim</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace( 'post' );
</script>
@endsection