@extends('layouts/public')
@section('content')
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
?>
<section id="first">
    <div class="container">
        <div class="index-box">
            <div class="row">
                <div class="col-md-5 left">
                    <div class="container">
                        <h4>Selamat Datang di Website Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</h4>
                        <p>
                            {{$b->teks}}
                        </p>
                        <!-- <a href="{{route('sejarah')}}"><button class="btn btn-light">Sejarah BPTD</button></a> -->
                    </div>
                </div>
                <div class="col-md-7 right">
                    <img src="{{asset('img/bgfirst.png')}}" alt="wisata gorontalo" class="header-img img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="pengumuman">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="section-title">Pengumuman</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container" style="text-align:center">
                    <a href="{{asset('img/'.$b->pengumuman)}}"><img src="{{asset('img/'.$b->pengumuman)}}" alt="Pengumuman BPTD" class="img-fluid pengumuman-img"></a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($berita->count() >= 3)
<section id="third">
    <div class="container">
    <div class="row">
            <div class="col-md-12">
                <h4 class="section-title">Lensa Kegiatan</h4>
                <hr>
            </div>
        </div>
            <div class="row">
                <div class="card-deck" style="margin-bottom:15px">
                       @foreach($berita as $b)
                        <div class="card artikel">
                            <a href="{{route('single',[$b->id,$b->slug])}}">
                            <img class="card-img-top artikel-thumbnail" src="{{asset('img/post/'.$b->thumbnail)}}" alt="Card image cap">    
                            </a>
                            <div class="card-body">
<!--                                <a href="#" class="card-tag">Event</a>-->
                                <a href="{{route('single',[$b->id,$b->slug])}}" class="artikel-link">
                                    <h5 class="card-title">{{Str::limit($b->title,100)}}</h5>
                                </a>
                                <p class="card-text"><small class="text-muted">{{Carbon::parse($b->post_date)->format('l, j F Y')}}</small></p>
                                <!-- <p class="card-text">{!! strip_tags(Str::limit($b->content,150)) !!}</p> -->
                                <!-- <a href="{{route('single',[$b->id,$b->slug])}}" class="btn btn-sm btn-secondary">Selengkapnya</a> -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                <a href="{{route('berita')}}"><button class="btn btn-dark">Lihat Semua Kegiatan</button></a>
                    </div>
                    
            </div>
        </div>
</section>
@endif
<section id="links">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="media links">
                    <img src="{{asset('img/link_keselamatan.png')}}" class="align-self-end mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Link Keselamatan</h5>
                        <a href="{{route('link_keselamatan')}}"><button class="btn btn-primary btn-links">Klik Disini</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media links">
                    <img src="{{asset('img/link_bulotu.png')}}" class="align-self-end mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Aplikasi "BULOTU"</h5>
                        <a href="{{route('probadut.index')}}"><button class="btn btn-primary btn-links">Klik Disini</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media links">
                    <img src="{{asset('img/link_surat.png')}}" class="align-self-end mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Penomoran Surat</h5>
                        <a href="{{route('surat.index')}}"><button class="btn btn-primary btn-links">Klik Disini</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection