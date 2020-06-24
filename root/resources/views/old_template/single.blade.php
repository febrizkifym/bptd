@extends('layouts/berita')
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
$b->title
@endsection
@section('content')
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <div class="article-header">
                <img src="{{asset('img/post/'.$b->thumbnail)}}" alt="{{Str::slug($b->title,'-')}}" class="img-fluid img-thumbnail">
                <p class="border-role"></p>
                <h2>{{$b->title}}</h2>
                <small class="tanggal">{{Carbon::parse($b->post_date)->format('l, j F Y')}}</small>
            </div>
            <div class="article-content">
            {!! $b->content !!}
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="label-section">TERKINI</h3>
            <p class="border-role"></p>
             @foreach($terkini as $t)
            <div class="feed clearfix">
                <div class="feed-thumbnail">
                   <a href="{{route('single',[$t->id,$t->slug])}}"> <img src="{{asset('img/post/'.$t->thumbnail)}}" alt="" class="thumbnail-img img-fluid"></a>
                </div>
                <div class="feed-content">
                    <span class="feed-date">{{Carbon::parse($t->post_date)->format('l, j F Y')}}</span>
                    <a href="{{route('single',[$t->id,$t->slug])}}" class="feed-link"><h5 class="feed-title">{{$t->title}}</h5></a>
                </div>
            </div>
            <p class="border-role"></p>
            @endforeach
        </div>
    </div>
</div>
@endsection