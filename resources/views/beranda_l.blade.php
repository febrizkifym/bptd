@extends('layouts/public')

@section('content')
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;  
?>
<div id="carousel-beranda" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-beranda" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-beranda" data-slide-to="1"></li>
    <li data-target="#carousel-beranda" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('img/1.jpeg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('img/2.jpeg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('img/3.jpeg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel-beranda" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-beranda" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container">

</div>
@endsection