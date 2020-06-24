@extends('layouts/public')
@section('content')
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Kegiatan BPTD</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- foreach -->
                @foreach($berita as $b)
                <div class="media">
                    <a href="{{route('single',[$b->id,$b->slug])}}"><img src="{{asset('img/post/'.$b->thumbnail)}}" class="align-self-start mr-5 news-thumbnail" alt="Thumbnail"></a>
                    <div class="media-body">
                        <a href="{{route('single',[$b->id,$b->slug])}}"><h5 class="mt-0 header-text">{{$b->title}}</h5></a>
                        <h6 class="mt-1">{{Carbon::parse($b->post_date)->format('l, j F Y')}}</h6>
                        <p>{!! strip_tags(Str::limit($b->content,150)) !!}</p>
                    </div>
                </div>
                <div class="garis garis-dark"></div>
                @endforeach
            </div>
            <div class="col-md">
                
            </div>
        </div>
    </div>
</section>
@endsection