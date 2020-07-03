@extends('layouts/public')
@section('content')
<section id="profile-header" class="wisata-header">
    <video autoplay muted loop id="header-vid">
        <source src="{{asset('new/video/torosiaje.mp4')}}" type="video/mp4">
    </video>
    <!-- <img src="{{asset('new/img/torosiaje/1.png')}}" alt="" onerror="this.onerror=null;this.src='{{asset('img/notfound.png')}}';"> -->
    <div class="jumbotron jumbotron-fluid wow fadeInUp whtcontainer">
        <div class="container">
            <h1 class="header-text display-3 ">Desa Torosiaje</h1>
        </div>
    </div>
</section>
<section id="wisata-description">
    <div class="container">
        <h1 class="header-text">Desa Wisata Torosiaje</h1>
        <div class="garis garis-dark"></div>
        <p>Desa Torosiaje merupakan salah satu destinasi wisata di Provinsi Gorontalo yang dikenal sebagai desa laut. Desa Torosiaje terletak di wilayah Kecamatan Popayato, Kabupaten Pohuwato, Provinsi Gorontalo.</p> 
        <p>Desa Torosiaje juga dikenal sebagai Kampung Bajo, karena merupakan tempat bagi suku Bajo. Desa ini berada di laut Teluk Tomini dan berjarak kurang lebih 600 meter dari daratan.</p>
    </div>
</section>
@endsection
@section('script')
<script>
    new WOW().init();
</script>
@endsection