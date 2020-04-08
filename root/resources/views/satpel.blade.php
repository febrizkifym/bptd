@extends('layouts/public')

@section('content')
<section id="satpel">
    <div class="container">
        <div class="post-thumbnail carousel">
            <img src="{{asset('img/'.$sp->gambar)}}" alt="" class="thumbnail img-fluid" onerror="this.onerror=null;this.src='{{asset('img/notfound.png')}}';" >
            <div class="carousel-caption post-title">
                <h1 style="margin-bottom:0;">{{$sp->nama}}</h1>
                <h1 style="font-size:11pt;padding:5px 0;font-weight:normal">{{$sp->alamat}}</h1>
            </div>
        </div>
        <hr>
        <h3>Tugas & Fungsi</h3>
        <div>
            <p>{{$sp->tupoksi}}</p>
        </div>
        <hr>
        @if($sp->struktur)
        <h3>Struktur Organisasi</h3>
        <div class="post-thumbnail carousel">
            <img src="{{asset('img/'.$sp->struktur)}}" alt="" style="width:100%;float:left;margin:25px 0;" class="img-fluid" onerror="this.onerror=null;this.src='{{asset('img/notfound.png')}}';" >
        </div>
        <hr>
        @endif
        <h3>Sumber Daya Manusia</h3>
        <table class="table table-hover table dataTable table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="uppercase">Nama</th>
                    <th>Pangkat (Golongan)</th>
                    <th class="uppercase">Jabatan</th>
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
@endsection