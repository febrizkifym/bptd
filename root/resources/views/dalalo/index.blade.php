@extends('layouts.public')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<style>
    #mapdalalo { height: 480px; }
</style>
@endsection

@section('content')
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Dalalo</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light   ">
                            <tr>
                                <th rowspan="2">NO</th>
                                <th rowspan="2">TABEL.KODE RAMBU</th>
                                <th rowspan="2">TAHUN PEROLEHAN</th>
                                <th rowspan="2">LOKASI/RUAS JALAN</th>
                                <th colspan="2">TITIK KOORDINAT</th>
                                <th rowspan="2">KET</th>
                            </tr>
                            <tr>
                                <th>N</th>
                                <th>E</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($titik as $t)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$t->tabel_kd}}</td>
                                <td>{{$t->tahun}}</td>
                                <td>{{$t->nama}}</td>
                                <td>{{$t->x}}</td>
                                <td>{{$t->y}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>         
                </div>
            </div>
            <div class="col-lg-12">
                <h2 class="header-text">Peta Gorontalo</h2>
                <div class="garis garis-dark"></div>
                <div id="mapdalalo"></div>
            </div>
    </div>
</section>
@endsection

@section('script')
<script>
    //initiate map
    var mapdalalo = L.map('mapdalalo').setView([0.5384433, 123.0594971], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapdalalo);

    //add points
    var titik = [@foreach($titik as $t){
        "type": "Feature",
        "properties": {
            "tabel_kd": "{{$t->tabel_kd}}",
            "ruas": "{{$t->nama}}",
            "tahun": "{{$t->tahun}}",
            "popupContent": "{{$t->tabel_kd}}",
        },
        "id": "{{$t->id}}",
        "geometry": {
            "type": "Point",
            "coordinates": [{{$t->x}}, {{$t->y}}]
        }
    },@endforeach]
    var rambuMarker = {
        radius: 5,
        fillColor: "#ff7800",
        color: "#000",
        weight: 0.8,
        opacity: 1,
        fillOpacity: 0.8
    };
    L.geoJSON(titik, {
        onEachFeature: function (f, l) {
        l.bindPopup('<pre>Tabel.Kode Rambu : '+f.properties.tabel_kd+'<br>Ruas : '+f.properties.ruas+'<br>Tahun Pemasangan : '+f.properties.tahun+'</pre>');
        },
        pointToLayer: function (feature, latlng) {
            return L.circleMarker(latlng, rambuMarker);
        }
    }).addTo(mapdalalo);
</script>
@endsection