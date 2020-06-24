@extends('layouts/public')
@section('content')
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <h3 class="label-section">VIDEO TERKAIT</h3>
            <p class="border-role"></p>
            <?php
                use Illuminate\Support\Str;
                use Carbon\Carbon;  
            ?>
            @foreach($video as $v)
            <div class="row">
                <div class="col-md-12">
                    <h3>{{$v->title}}</h3>
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$v->video_path}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="border-role"></p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <h3 class="label-section">KEGIATAN TERKINI</h3>
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