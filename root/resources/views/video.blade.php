@extends('layouts/public')
@section('content')
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;  
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Galeri Video</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @foreach($video as $v)
                <h4 class="header-text display-5">{{$v->title}}</h4>
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$v->video_path}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="garis garis-dark"></div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection