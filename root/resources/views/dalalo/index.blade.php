@extends('layouts.public')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<link rel="stylesheet" href="{{asset('new/css/MarkerCluster.Default.css')}}">
<link rel="stylesheet" href="{{asset('new/css/MarkerCluster.css')}}">
<script src="{{asset('new/js/leaflet.markercluster.js')}}"></script>
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
                <h2 class="header-text">Peta Gorontalo</h2>
                <div class="garis garis-dark"></div>
                <div id="mapdalalo"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- <h2 class="header-text">Tabel</h2> -->
                <div class="garis garis-dark"></div>
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead class="thead-light">
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
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    //initiate datatable
    $('.data-table').dataTable({
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>'
    });
    //initiate map
    var mapdalalo = L.map('mapdalalo').setView([0.5384433, 123.0594971], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapdalalo);

    //tambah titik 
    var titik = {
        "type": "FeatureCollection", 
        "features": [
            @foreach($titik as $t)
            { "type": "Feature", "id":"{{$t->id}}", "properties": { "tabel_kd": "{{$t->tabel_kd}}","ruas": "{{$t->nama}}","tahun": "{{$t->tahun}}","ket": "{{$t->ket}}"   }, "geometry": { "type": "Point", "coordinates": [{{$t->x}}, {{$t->y}}] }},
            @endforeach
        ]
    };
    var warning = {
        "type" : "FeaturesCollection",
        "features": [
            @foreach($warning as $wl)
            { "type": "Feature", "id":"{{$t->id}}", "properties": { "tabel_kd": "{{$t->tabel_kd}}","ruas": "{{$t->nama}}","tahun": "{{$t->tahun}}","ket": "{{$t->ket}}"   }, "geometry": { "type": "Point", "coordinates": [{{$t->x}}, {{$t->y}}] }},
            @endforeach
        ]
    }

    //buat icon
    var rambuMarker = {
        radius: 8,
        fillColor: "#ffff00",
        color: "#000",
        weight: 0.8,
        opacity: 1,
        fillOpacity: 0.8
    };
    var warningMarker = {
        radius: 8,
        fillColor: "#ff9900",
        color: "#000",
        weight: 0.8,
        opacity: 1,
        fillOpacity: 0.8
    };

    //cluster ke map
    var markers = L.markerClusterGroup();
    var rambuCluster = L.geoJson(titik, {
			onEachFeature: function (feature, layer) {
				layer.bindPopup('<pre>Tabel.Kode Rambu : '+feature.properties.tabel_kd+'<br>Ruas : '+feature.properties.ruas+'<br>Tahun Pemasangan : '+feature.properties.tahun+'<br>Keterangan : '+feature.properties.ket+'</pre>');
			},
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, rambuMarker);
            }
		});
    markers.addLayer(rambuCluster);
    
    var warningCluster = L.geoJson(warning, {
			onEachFeature: function (feature, layer) {
				layer.bindPopup('<pre>Tabel.Kode Rambu : '+feature.properties.tabel_kd+'<br>Ruas : '+feature.properties.ruas+'<br>Tahun Pemasangan : '+feature.properties.tahun+'<br>Keterangan : '+feature.properties.ket+'</pre>');
			},
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, warningMarker);
            }
		});
    markers.addLayer(warningCluster);

    mapdalalo.addLayer(markers);
    mapdalalo.fitBounds(markers.getBounds());
</script>
@endsection