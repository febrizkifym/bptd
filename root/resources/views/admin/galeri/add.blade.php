@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Foto</h5>
            </div>
            <div class="widget-content">
              <h5>{{$berita->title}}</h5>
               <form action="{{route('galeri.post',$id)}}" method="post" enctype="multipart/form-data">
                   @csrf
               </form>
            </div>
        </div>
    </div>
</div>
@endsection