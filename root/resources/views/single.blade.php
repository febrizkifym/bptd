@extends('layouts/public')
<?php            
    use Illuminate\Support\Str;  
    use Carbon\Carbon;
?>
@section('meta')
@include('meta::manager', [
    'title'         => $b->title,
    'description'   => strip_tags(Str::limit($b->content,500)),
    'image'         => asset('img/post/'.$b->thumbnail),
    ])
@endsection
@section('title')
{{$b->title}}
@endsection
@section('content')
<section id="profile-header">
    <img src="{{asset('img/post/'.$b->thumbnail)}}" alt="{{Str::slug($b->title,'-')}}"  alt="">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h5 class="header-text display-5">{{Carbon::parse($b->post_date)->format('l, j F Y')}}</h5>
            <h1 class="header-text display-4">{{$b->title}}</h1>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9 news-description">
                <img src="{{asset('img/post/'.$b->thumbnail)}}" alt="" class="img-fluid">
                <div class="garis garis-dark"></div>
                {!! $b->content !!}
            </div>
            <div class="col-md">
            <h4 class="header-text">Kegiatan Terkini</h4>
            <div class="garis garis-dark"></div>
            @foreach($terkini as $t)
                <div class="feed clearfix">
                    <div class="row">
                        <div class="col-lg-12 feed-thumbnail">
                            <a href="{{route('single',[$t->id,$t->slug])}}"><img src="{{asset('img/post/'.$t->thumbnail)}}" alt="" class="thumbnail-img img-fluid"></a>
                        </div>
                        <div class="col-lg-12 feed-content">
                            <span class="feed-date">{{Carbon::parse($t->post_date)->format('l, j F Y')}}</span>
                            <a href="{{route('single',[$t->id,$t->slug])}}" class="feed-link"><h5 class="feed-title">{{$t->title}}</h5></a>
                            <p>{!! strip_tags(Str::limit($t->content,150)) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="garis garis-dark"></div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection