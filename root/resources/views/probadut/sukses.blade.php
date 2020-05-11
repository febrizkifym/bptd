<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PROBADUT - BPTD XXI GORONTALO</title>
    <link rel="shortcut icon" href="{{asset('pbd/img/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('pbd/css/style.css')}}">
    <style>
        tr{
            height:40px;
        }
    </style>
</head>
<body>
<section id="sukses">
    <div class="col-lg-6 offset-lg-3">
        <div class="sukses-box d-block mx-auto">
            <img src="{{asset('pbd/img/checklist.svg')}}" alt="Sukses" class="img-fluid d-block mx-auto" style="height:150px;width:150px">
            <h2 class="text-center">Sukses</h2>
            <pre>
                <?php
                $a = Session::get('result');
                ?>
            </pre>
            <hr>
            <p>Calon Penumpang berhasil didaftarkan dengan data sebagai berikut:</p>
            <table>
                <tr><th>Nama Lengkap</th><td>:</td><td>{{$a['nama']}}</td></tr>
                <tr><th>Nomor KTP</th><td>:</td><td>{{$a['no_ktp']}}</td></tr>
                <tr><th>Jenis Kelamin</th><td>:</td><td>{{$a['jenis_kelamin']}}</td></tr>
                <tr><th>Agama</th><td>:</td><td>{{$a['agama']}}</td></tr>
                <tr><th>Usia</th><td>:</td><td>{{$a['usia']==1?"Dewasa (Lebih dari 12 Tahun)":"Anak-Anak (Kurang dari 12 Tahun)"}}</td></tr>
                <tr><th>Kapal</th><td>:</td><td></td></tr>
                <tr><th>Kelas/Golongan</th><td>:</td><td></td></tr>
                <tr><th>Tarif</th><td>: Rp.</td><td></td></tr>
            </table>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="{{asset('pbd/js/main.js')}}"></script>
</body>
</html>