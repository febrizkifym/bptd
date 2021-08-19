@extends('apkprofil.layout')
@section('content')
    <img src="{{asset('asset_apk/kemenhub.svg')}}" alt="Logo Kemenhub" class="img-fluid mx-auto d-block">
    <div class="line"></div>
    <h3 class="text-center">BALAI PENGELOLA TRANSPORTASI DARAT WILAYAH XXI<br>PROVINSI GORONTALO</h3>
    <div class="line"></div>
    <h2>Profil</h2>
    <p>Balai Pengelola Transportasi Darat Wilayah-XXI Provinsi Gorontalo sebagai salah satu unit kerja Kementerian Perhubungan terbentuk bulan Agustus Tahun 2017 terdiri dari : 4  (empat) Seksi : Sub Bag Tata Usaha, Seksi Sarana Prasarana, Seksi Lalulintas dan Angkutan Jalan, Seksi Tarnsportasi Sungai, Danau dan Penyeberangan dan 6 (enam) Satuan Pelayanan : Terminal Tipe A Dungingi, Terminal Tipe A Isimu, Pelabuhan Penyeberangan Gorontalo, Pelabuhan Penyeberangan Marisa, UPPKB Molotabu dan UPPKB Marisa</p>
    <div class="line"></div>
    <h2>Satuan Pelayanan</h2>
    <div class="line"></div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 image-grid-item">
            <div style="background-image: url({{asset('asset_apk/card_ppg.png')}});" class="image-grid-cover">
                <a href="{{route('apkprofil.profil_ppg')}}" class="image-grid-clickbox"></a>
                <a href="{{route('apkprofil.profil_ppg')}}" class="cover-wrapper">PELABUHAN PENYEBERANGAN GORONTALO </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 image-grid-item">
            <div style="background-image: url({{asset('asset_apk/card_ppm.png')}});" class="image-grid-cover">
                <a href="{{route('apkprofil.profil_ppm')}}" class="image-grid-clickbox"></a>
                <a href="{{route('apkprofil.profil_ppm')}}" class="cover-wrapper">PELABUHAN PENYEBERANGAN MARISA </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 image-grid-item">
            <div style="background-image: url({{asset('asset_apk/card_ttadungingi.png')}});" class="image-grid-cover">
                <a href="{{route('apkprofil.profil_ttadungingi')}}" class="image-grid-clickbox"></a>
                <a href="{{route('apkprofil.profil_ttadungingi')}}" class="cover-wrapper">TERMINAL TIPE A DUNGINGI </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 image-grid-item">
            <div style="background-image: url({{asset('asset_apk/card_ttaisimu.png')}});" class="image-grid-cover">
                <a href="{{route('apkprofil.profil_ttaisimu')}}" class="image-grid-clickbox"></a>
                <a href="{{route('apkprofil.profil_ttaisimu')}}" class="cover-wrapper">TERMINAL TIPE A ISIMU </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 image-grid-item">
            <div style="background-image: url({{asset('asset_apk/card_uppkbmarisa.png')}});" class="image-grid-cover">
                <a href="{{route('apkprofil.profil_uppkbmarisa')}}" class="image-grid-clickbox"></a>
                <a href="{{route('apkprofil.profil_uppkbmarisa')}}" class="cover-wrapper">UPPKB MARISA </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 image-grid-item">
            <div style="background-image: url({{asset('asset_apk/card_uppkbmolotabu.png')}});" class="image-grid-cover">
                <a href="{{route('apkprofil.profil_uppkbmolotabu')}}" class="image-grid-clickbox"></a>
                <a href="{{route('apkprofil.profil_uppkbmolotabu')}}" class="cover-wrapper">UPPKB MOLOTABU </a>
            </div>
        </div>
    </div>
@endsection