@extends('layouts/public')
@section('content')
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">PPID BPTD Kelas II Gorontalo</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<div style="margin-top:50px"></div>
@if($ppid)
@if($berkala->first())
<section id="berkala">
    <div class="container">
        <h2>Informasi Berkala</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            @foreach($berkala as $p)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$p->tanggal}}</td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td>{{$p->judul}}</td>
                <td>{{$p->deskripsi}}</td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/{{$p->file}}"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
    </div>
</section>
@endif
@if($sertamerta->first())
<section id="sertamerta">
    <div class="container">
        <h2>Informasi Serta Merta</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            @foreach($sertamerta as $p)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$p->tanggal}}</td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td>{{$p->judul}}</td>
                <td>{{$p->deskripsi}}</td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/{{$p->file}}"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
    </div>
</section>
@endif
@if($setiapsaat->first())
<section id="setiapsaat">
    <div class="container">
        <h2>Informasi Berkala</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            @foreach($setiapsaat as $p)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$p->tanggal}}</td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td>{{$p->judul}}</td>
                <td>{{$p->deskripsi}}</td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/{{$p->file}}"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
    </div>
</section>
@endif
@if($dikecualikan->first())
<section id="dikecualikan">
    <div class="container">
        <h2>Informasi Dikecualikan</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            @foreach($dikecualikan as $p)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$p->tanggal}}</td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td>{{$p->judul}}</td>
                <td>{{$p->deskripsi}}</td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/{{$p->file}}"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
    </div>
</section>
@endif
@endif
@endsection