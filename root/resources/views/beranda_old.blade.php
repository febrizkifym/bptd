@extends('layouts/public')

@section('content')

                      <?php
                            use Illuminate\Support\Str;
                            use Carbon\Carbon;  
                        ?>
<section class="indexsection carousel" id="first">
    <div class="row" style="margin:0">
        <div class="col-md-5" style="background-color:#232464;">
            <div class="container" style="padding:10% 5% 0 10%;">
                    <h4>Selamat Datang di Website Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</h4>
                    <p>
                        Balai Pengelola Transportasi Darat atau disingkat BPTD dibentuk pada tanggal 30 Desember 2016 berdasarkan Peraturan Menteri Perhubungan Nomor 154 Tahun 2016 dan merupakan Unit Pelaksana Teknis di lingkungan Kementerian Perhubungan berada di bawah dan bertanggung jawab kepada Menteri Perhubungan melalui Direktur Jenderal Perhubungan Darat
                    </p>
                    <a href="{{route('sejarah')}}"><button class="btn btn-secondary">Sejarah BPTD</button></a>
            </div>
        </div>
        <div class="col-md-7" style="padding:0">
            <img src="{{asset('img/bgfirst.png')}}" alt="" class="img-fluid img-bg">
        </div>
    </div>
</section>
<section id="pengumuman" class="indexsection">
    <div class="container">
        <h3>Pengumuman</h3>
        <hr>
        <a href="{{asset('img/pengumuman.jpeg')}}"><img src="{{asset('img/pengumuman.jpeg')}}" alt="" class="img-fluid"></a>
    </div>
</section>
<div class="container">
</div>
@if($berita->count() >= 3)
<section class="indexsection" id="third">
    <div class="container">
    <h3>Lensa Kegiatan BPTD</h3>
        <hr>
            <div class="row">
                <div class="card-deck">
                       @foreach($berita as $b)
                        <div class="card artikel">
                            <a href="{{route('single',[$b->id,$b->slug])}}">
                            <img class="card-img-top artikel-thumbnail" src="{{asset('img/post/'.$b->thumbnail)}}" alt="Card image cap">    
                            </a>
                            <div class="card-body">
                                <a href="{{route('single',[$b->id,$b->slug])}}" class="artikel-link">
                                    <h5 class="card-title">{{Str::limit($b->title,50)}}</h5>
                                </a>
                                <p class="card-text"><small class="text-muted">{{Carbon::parse($b->created_at)->format('l, j F Y')}}</small></p>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
</section>
@endif
@endsection