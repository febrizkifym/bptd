@extends('layouts/public')
@section('content')
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
    use App\Galeri;
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Galeri Foto</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        @foreach($berita as $b)
        <h4 class="header-text display-5">{{$b->title}}</h4>
        <h6 class="header-text display-5">{{Carbon::parse($b->post_date)->format('l, j F Y')}}</h6>
        <div class="garis garis-dark"></div>
        <div class="row">
            <?php
                $galeri = Galeri::where('id_berita',$b->id)->get();
            ?>
            @foreach($galeri as $g)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="{{asset('img/galeri/'.$g->path)}}" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="{{asset('img/galeri/'.$g->path)}}" alt="">
                </a>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection