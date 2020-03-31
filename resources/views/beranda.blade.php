@extends('layouts/public')
@include('meta::manager')

@section('content')

                      <?php
                            use Illuminate\Support\Str;
                            use Carbon\Carbon;  
                        ?>
<section class="indexsection carousel" id="first">
  <img src="img/bgfirst.png" alt="" class="img-fluid img-bg">
   <div class="carousel-caption post-title">
       <h1>Selamat Datang di Website Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</h1>
   </div>
</section>
<div class="container">
<section class="indexsection" id="second">
   <div class="container">
       <div class="row">
           <div class="col-md-4">
               <img src="img/circle1.png" alt="" class="img-fluid img-page">
           </div>
           <div class="col-md-8" style="padding-top:50px">
                <h2>Balai Pengelola Transportasi Darat</h2>
                <hr>
                <p>Balai Pengelola Transportasi Darat atau disingkat BPTD dibentuk pada tanggal 30 Desember 2016 berdasarkan Peraturan Menteri Perhubungan Nomor 154 Tahun 2016 dan mulai melaksanakan tugas secara resmi pada tanggal 21 Juli 2017... <a href="{{route('sejarah')}}">Selengkapnya</a></p>
           </div>
       </div>
   </div>
</section>
</div>
@if($berita->count() == 3)
<section class="indexsection" id="third">
    <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h1>Lensa Kegiatan</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="card-deck">
                       @foreach($berita as $b)
                        <div class="card artikel">
                            <a href="{{route('single',[$b->id,$b->slug])}}">
                            <img class="card-img-top artikel-thumbnail" src="{{url('storage/img/post').'/'.$b->thumbnail}}" alt="Card image cap">    
                            </a>
                            <div class="card-body">
<!--                                <a href="#" class="card-tag">Event</a>-->
                                <a href="{{route('single',[$b->id,$b->slug])}}" class="artikel-link">
                                    <h5 class="card-title">{{Str::limit($b->title,50)}}</h5>
                                </a>
                                <p class="card-text"><small class="text-muted">{{Carbon::parse($b->created_at)->format('l, j F Y')}}</small></p>
                                <p class="card-text">{!! strip_tags(Str::limit($b->content,150)) !!}</p>
                                <a href="{{route('single',[$b->id,$b->slug])}}" class="btn btn-sm btn-secondary">Selengkapnya</a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
</section>
@endif
@endsection