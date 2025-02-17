@extends('layouts/public')
@section('style')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('new/css/slick-theme.css') }}" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection
@section('content')
    <?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
    ?>
    <section id="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="header-text display-5">Selamat Datang di Website</h1>
                <h1 class="header-text display-4">Balai Pengelola Transportasi Darat</h1>
                <h1 class="header-text display-4">Kelas II Gorontalo</h1>
                <div class="garis"></div>
                <h5 class="header-text display-5">Kawasan Pembangunan Zona Integritas</h5>
                <h5 class="header-text display-5">Wilayah Bebas Korupsi dan Wilayah Birokrasi Bersih Melayani</h5>
            </div>
        </div>
    </section>
    <section id="pengumuman">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="container pengumuman-text">
                        <div class="frame">
                            <span>Keselamatan Adalah Tanggung Jawab Kita Bersama</span>
                            <span class="footer">ZULMARDI, ATD, M.M</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('new/img/kabalainobg.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- <section id="wisata">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                    <h2 class="header-text wisata-ht">Wisata Gorontalo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 wisata-card">
                <img src="{{asset('new/img/torosiaje/card.png')}}" alt="">
                <a href="{{route('wisata.torosiaje')}}" class="title">Desa Torosiaje</a>
            </div>
            <div class="col-lg-6 wisata-card">
                <img src="{{asset('new/img/pantairatu/card.png')}}" alt="">
                <a href="{{route('wisata.pantairatu')}}" class="title">Pantai Ratu</a>
            </div>
        </div>
    </div>
</section> --}}
    <section id="berita">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 berita-kiri">
                    <div class="container">
                        <!-- <div class="frame align-self-center">
                            <span>Keselamatan Adalah Hak Milik Kita Bersama</span>
                        </div> -->
                    </div>
                </div>
                <div class="col-md berita-kanan">
                    <div class="container">
                        <h2 class="header-text">LENSA KEGIATAN</h2>
                        <div class="garis garis-dark"></div>
                        <!-- foreach -->
                        @foreach ($berita as $b)
                            <div class="feed clearfix">
                                <div class="row">
                                    <div class="col-lg-3 feed-thumbnail">
                                        <a href="{{ route('single', [$b->id, $b->slug]) }}"><img
                                                src="{{ asset('img/post/' . $b->thumbnail) }}" alt=""
                                                class="thumbnail-img img-fluid"></a>
                                    </div>
                                    <div class="col-lg-9 feed-content">
                                        <span
                                            class="feed-date">{{ \Carbon\Carbon::parse($b->post_date)->formatLocalized('%A, %d %B %Y') }}</span>
                                        <a href="{{ route('single', [$b->id, $b->slug]) }}" class="feed-link">
                                            <h5 class="feed-title">{{ $b->title }}</h5>
                                        </a>
                                        <p>{!! strip_tags(Str::limit($b->content, 150)) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="garis garis-dark"></div>
                        @endforeach
                        <a href="{{ route('berita') }}" class="btn btn-dark btn-berita">Semua Kegiatan BPTD</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="links">
        <div class="slider container">
            {{-- <div class="slide"><a href="{{ route('link_keselamatan') }}"><img
                        src="{{ asset('new/img/slider_keselamatan.png') }}"></a></div> --}}
            <div class="slide"><a href="{{ route('laporan_skm') }}"><img src="{{ asset('new/img/slider_skm.png') }}"></a>
            </div>
            {{-- <div class="slide"><a href="{{route('probadut.index')}}"><img src="{{asset('new/img/slider_bulotu.png')}}"></a></div> --}}
        </div>
    </section>
    <div class="modal fade" id="maklumat2021" tabindex="-1" aria-labelledby="labelMaklumat2021" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelMaklumat2021">Maklumat Pelayanan Tahun 2021</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('new/img/maklumat2021.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // var vid = document.getElementById("lagu");
            // vid.volume = 0.4;
            $('.slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    </script>
@endsection
