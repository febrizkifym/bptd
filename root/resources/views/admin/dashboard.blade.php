@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Setting Beranda</h5>
            </div>
            <div class="widget-content">
               <div class="alert alert-info">
              <button class="close" data-dismiss="alert">×</button>
              Klik dua kali pada kotak teks untuk mengedit.</div>
               <form action="{{route('beranda.update')}}" method="post" enctype="multipart/form-data">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Teks Beranda</th>
                        <td>
                            <textarea name="teks" id="teks" cols="30" rows="2" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">{{$b->teks}}</textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>Teks Sejarah</th>
                        <td>
                            <textarea name="sejarah" id="sejarah" cols="30" rows="2" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">{{$b->sejarah}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Banner Pengumuman</th>
                        <td>
                            @if($b->pengumuman)
                                <a href="{{asset('img/'.$b->pengumuman)}}"><img src="{{asset('img/'.$b->pengumuman)}}" alt="Pengumuman" style="object-fit:contain" class="img-thumbnail"></a>
                            @else
                            <span class="label label-warning">Belum Diinput</span>
                            @endif
                            <hr>
                            <input type="file" name="pengumuman">
                            @if($errors->has('pengumuman'))
                            <div class="alert alert-error">
                                {{$errors->first('pengumuman')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>TV Informasi</h5>
            </div>
            <div class="widget-content">
               <form action="{{route('tvinformasi.update')}}" method="post" enctype="multipart/form-data">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Running Text</th>
                        <td>
                            <textarea name="tv_runningtext" id="tv_runningtext" cols="30" rows="2" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">{{$b->tv_runningtext}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Video</th>
                        <td>
                            @if($b->video)
                                ada
                            @else
                            <span class="label label-warning">Belum Diinput</span>
                            <div>(Video harus format MP4)</div>
                            @endif
                            <hr>
                            <input type="file" name="tv_video">
                            @if($errors->has('gambar'))
                            <div class="alert alert-error">
                                {{$errors->first('gambar')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection