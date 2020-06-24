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
                
            </div>
        </div>
    </div>
</section>
@endsection