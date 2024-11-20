@extends('layouts/public')
@section('content')
<section id="profile-header">
    <img src="{{asset('img/'.$sp->gambar)}}" alt="" onerror="this.onerror=null;this.src='{{asset('img/notfound.png')}}';">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-4">{{$sp->nama}}</h1>
            <h1 class="header-text display-5">{{$sp->alamat}}</h1>
        </div>
    </div>
</section>
<section id="profile-description">
    <div class="container">
        <h1 class="header-text">Tugas dan Fungsi</h1>
        <div class="garis"></div>
        {!!$sp->tupoksi!!}
        <div class="garis garis-dark"></div>
        @if($sp->struktur)
        <h1 class="header-text">Struktur Organisasi</h1>
        <div class="garis"></div>
        <a href="{{asset('img/'.$sp->struktur)}}"><img src="{{asset('img/'.$sp->struktur)}}" alt="" class="img-fluid mx-auto"></a>
        <div class="garis garis-dark"></div>
        @endif
    </div>
</section>
<!--
<section id="profile-sdm">
    <div class="container">
        <h1 class="header-text">Sumber Daya Manusia</h1>
        <div class="garis"></div>
        <table class="table">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>Nama</td>
                    <td>Pangkat (Golongan)</td>
                    <td>Jabatan</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $sdm = App\Sdm::where('satpel',$sp->id)->get();
                ?>
                @foreach($sdm as $s)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->pangkat}}</td>
                    <td>{{$s->jabatan}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
-->
@endsection