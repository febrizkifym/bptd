@extends('layouts/public')
<?php            
    use Illuminate\Support\Str;  
    use Carbon\Carbon;
?>
@section('content')
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <div class="article-header">

                <h2>{{$b->title}}</h2>
                <small class="tanggal">{{Carbon::parse($b->created_at)->format('l, j F Y')}}</small>
                <img src="{{asset('img/post/'.$b->thumbnail)}}" alt="" class="img-fluid img-thumbnail">
            </div>
            <div class="article-content">
            {!! $b->content !!}
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="label-section">TERKINI</h3>
            <p class="border-role"></p>
             @foreach($terpopuler as $t)
            <div class="feed clearfix">
                <div class="feed-thumbnail">
                   <a href="{{route('single',[$t->id,$t->slug])}}"> <img src="{{asset('img/post/'.$b->thumbnail)}}" alt="" class="thumbnail-img"></a>
                </div>
                <div class="feed-content">
                    <span class="feed-date">{{Carbon::parse($t->created_at)->format('l, j F Y')}}</span>
                    <a href="{{route('single',[$t->id,$t->slug])}}" class="feed-link"><h5 class="feed-title">{{$t->title}}</h5></a>
                </div>
            </div>
            <p class="border-role"></p>
            @endforeach
        </div>
    </div>
</div>
@endsection