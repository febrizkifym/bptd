@extends('layouts/public')
@section('content')
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <h3 class="label-section">TERKINI</h3>
            <p class="border-role"></p>
            <?php
                use Illuminate\Support\Str;
                use Carbon\Carbon;  
            ?>
            @foreach($berita as $b)
            <div class="feed clearfix">
                <div class="row">
                    <div class="col-md-3 feed-thumbnail">
                        <a href="{{route('single',[$b->id,$b->slug])}}"><img src="{{asset('img/post/'.$b->thumbnail)}}" alt="" class="thumbnail-img img-fluid"></a>
                    </div>
                    <div class="col-md-9 feed-content">
                        <span class="feed-date">{{Carbon::parse($b->post_date)->format('l, j F Y')}}</span>
                        <a href="{{route('single',[$b->id,$b->slug])}}" class="feed-link"><h5 class="feed-title">{{$b->title}}</h5></a>
                        <p>{!! strip_tags(Str::limit($b->content,150)) !!}</p>
                    </div>
                </div>
            </div>
            <p class="border-role"></p>
            @endforeach
            <h3 class="label-section">VIDEO BERITA</h3>
            <div class="row">
                <div class="col-md-6">
                    <iframe width="100%" height="120%" src="https://www.youtube.com/embed/HSz7Kx2wH20" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="label-section">TERPOPULER</h3>
            <p class="border-role"></p>
            @foreach($terpopuler as $t)
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