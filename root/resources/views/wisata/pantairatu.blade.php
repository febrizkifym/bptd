@extends('layouts/public')
@section('content')
<section id="profile-header" class="wisata-header">
    <video autoplay muted loop id="header-vid">
        <source src="{{asset('new/video/pantairatu.mp4')}}" type="video/mp4">
    </video>
    <!-- <img src="{{asset('new/img/torosiaje/1.png')}}" alt="" onerror="this.onerror=null;this.src='{{asset('img/notfound.png')}}';"> -->
    <div class="jumbotron jumbotron-fluid wow fadeInUp whtcontainer">
        <div class="container">
            <h1 class="header-text display-3 ">Pantai Ratu</h1>
        </div>
    </div>
</section>
<section id="wisata-description">
    <div class="container">
        <h1 class="header-text">Wisata Pantai Ratu</h1>
        <div class="garis garis-dark"></div>
        <p>Objek wisata yang menawarkan pemandangan pantai dan alam di sekitarnya, suasana yang sangat nyaman dan aman untuk menikmati alam.</p>
        <p>Wisata pantai ratu didesain dengan koridor kayu yang berdiri di atas pantai dengan kesejukan yang nyaman.</p>
    </div>
</section>
@endsection
@section('script')
<script>
    new WOW().init();
</script>
@endsection