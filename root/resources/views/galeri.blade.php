@extends('layouts/public')

@section('content')
<div id="galeri">
    <div class="container">
    <?php
        use Illuminate\Support\Str;
        use Carbon\Carbon;
        use App\Galeri;
    ?>
    @foreach($berita as $b)
    <section id="{{Str::slug($b->title,'-')}}">
       <h5>{{$b->title}}</h5>
       <h6>{{Carbon::parse($b->created_at)->format('l, j F Y')}}</h6>
        <div class="row">
            <?php
                $galeri = Galeri::where('id_berita',$b->id)->get();
            ?>
            @foreach($galeri as $g)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$b->title}}"
                    data-image="{{asset('img/galeri/'.$g->path)}}"
                    data-target="#image-gallery">
                        <img class="img-thumbnail"
                            src="{{asset('img/galeri/'.$g->path)}}"
                            alt="alt">
                    </a>
                </div>
            @endforeach
        </div>
        <hr>
    </section>
    @endforeach
        <div class="row">
            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection