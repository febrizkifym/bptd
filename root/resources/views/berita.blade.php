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
                <h4 class="header-text">Kegiatan Terbaru</h4>
                <div class="garis garis-dark"></div>
                <!-- foreach -->
                @foreach($berita as $b)
                <div class="feed clearfix">
                    <div class="row">
                        <div class="col-lg-3 feed-thumbnail">
                            <a href="{{route('single',[$b->id,$b->slug])}}"><img src="{{asset('img/post/'.$b->thumbnail)}}" alt="" class="thumbnail-img img-fluid"></a>
                        </div>
                        <div class="col-lg-9 feed-content">
                            <span class="feed-date">{{Carbon::parse($b->post_date)->formatLocalized('%A, %d %B %Y')}}</span>
                            <a href="{{route('single',[$b->id,$b->slug])}}" class="feed-link"><h5 class="feed-title">{{$b->title}}</h5></a>
                            <p>{!! strip_tags(Str::limit($b->content,150)) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="garis garis-dark"></div>
                @endforeach
                <div class="pagination">
                    {{ $berita->links() }}
                </div>
            </div>
            <div class="col-md">
                <h4 class="header-text">Kegiatan Terpopuler</h4>
                <div class="garis garis-dark"></div>
                @foreach($terpopuler as $t)
                <div class="feed clearfix">
                    <div class="row">
                        <div class="col-lg-12 feed-thumbnail">
                            <a href="{{route('single',[$t->id,$t->slug])}}"><img src="{{asset('img/post/'.$t->thumbnail)}}" alt="" class="thumbnail-img img-fluid"></a>
                        </div>
                        <div class="col-lg-12 feed-content">
                            <span class="feed-date">{{Carbon::parse($t->post_date)->formatLocalized('%A, %d %B %Y')}}</span>
                            <a href="{{route('single',[$t->id,$t->slug])}}" class="feed-link"><h6 class="feed-title">{{$t->title}}</h6></a>
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