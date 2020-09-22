<!DOCTYPE html>
<html lang="en">

<head>
    <title>TV INFORMASI BPTD WIL.XXI PROVINSI GORONTALO</title>
    <link rel="stylesheet" href="{{asset('new/css/bootstrap.min.css')}}">
    <script src="{{asset('new/js/jquery-3.5.1.min.js')}}"></script> <!-- <script src="js/flipclock.js"></script> -->
    <link rel="stylesheet" href="css/flipclock.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/slick-theme.css')}}" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Arial';
        }

        body {
            background: url('img/tvinformasi/bgnew.jpg') top left no-repeat;
            background-size: cover;
        }

        .logo-wrapper {
            text-align: center;
            height: 170px;
            /* padding:10px 0; */
            margin: 10px 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .logo {
            height: 100%;
        }

        .video-wrapper {
            width: 100%;
            max-height: 100%;

        }

        .video {
            min-height: 520px;
        }

        .table-fullwidth>table {
            width: 100%;
            max-height: 550px;
            overflow-y: hidden;
        }

        .table-fullwidth>h1 {
            font-weight: bold;
            color: #FFF;
            text-align: center;
        }

        .table-wrapper {
            /* overflow-y:hidden; */
            max-height: 835px;
            font-size: 14.5pt;
        }

        .bold {
            font-weight: bold;
        }

        .table-pagu {
            font-size: 9pt;
        }

        .thead-dark>tr>th {
            text-align: center;
            vertical-align: middle;
        }

        .img-wrapper>img {
            width: 100%;
            max-height: 540px;
        }

        #jam {
            background-color: rgba(0, 0, 0, 0.7);
            color: #FFF;
            text-align: center;
            font-size: 21pt;
            padding: 0.5% 10px;
            height: 40px;
        }

        #running-text {
            font-size: 19pt;
            width: 100%;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.7);
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }

        #running-text span {
            font-weight: bold;
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 40px;
            text-align: center;
            /* Starting position */
            -moz-transform: translateX(100%);
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            /* Apply animation to this element */
            -moz-animation: scroll-left 20s linear infinite;
            -webkit-animation: scroll-left 20s linear infinite;
            animation: scroll-left 20s linear infinite;
        }

        /* Move it (define the animation) */
        @-moz-keyframes scroll-left {
            0% {
                -moz-transform: translateX(100%);
            }

            100% {
                -moz-transform: translateX(-100%);
            }
        }

        @-webkit-keyframes scroll-left {
            0% {
                -webkit-transform: translateX(100%);
            }

            100% {
                -webkit-transform: translateX(-100%);
            }
        }

        @keyframes scroll-left {
            0% {
                -moz-transform: translateX(100%);
                /* Browser bug fix */
                -webkit-transform: translateX(100%);
                /* Browser bug fix */
                transform: translateX(100%);
            }

            100% {
                -moz-transform: translateX(-100%);
                /* Browser bug fix */
                -webkit-transform: translateX(-100%);
                /* Browser bug fix */
                transform: translateX(-100%);
            }
        }

        /*  */
        .nopadding-left {
            padding-left: 0;
        }

        .nopadding-right {
            padding-right: 0;
        }

        .nopadding-both {
            padding: 0;
        }

        #fix-bot {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /*  */
        .slick-arrow {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="logo-wrapper">
                        <img src="{{asset('img/tvinformasi/logotv.png')}}" alt="" class="logo img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 nopadding-right">
                <div class="container-fluid table-wrapper nopadding-right">
                    <div class="slick">
                        <div class="item">
                            <table class="table table-light table-striped" style="margin-bottom:0;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO</th>
                                        <th>KEGIATAN</th>
                                        <th>TANGGAL</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use Carbon\Carbon;

                                    $id = 1; ?>
                                    @foreach($kegiatan1 as $k1)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$k1->kegiatan}}</td>
                                        <td>{{Carbon::parse($k1->date)->format('d F Y')}}</td>
                                        <td>@if($k1->keterangan){{$k1->keterangan}}@else {{"-"}} @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="item">
                            <table class="table table-light table-striped" style="margin-bottom:0;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO</th>
                                        <th>KEGIATAN</th>
                                        <th>TANGGAL</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 6; ?>
                                    @foreach($kegiatan2 as $k2)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$k2->kegiatan}}</td>
                                        <td>{{Carbon::parse($k2->date)->format('d F Y')}}</td>
                                        <td>@if($k2->keterangan){{$k2->keterangan}}@else {{"-"}} @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container" style="height:100%">
                    <div class="video-wrapper" style="height:100%">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ym9_WfOxioc?autoplay=1&controls=0&loop=1&playlist=ym9_WfOxioc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture;" class="video" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div id="fix-bot">
            <div class="row">
                <div class="col-2 nopadding-both">
                    <div class="container-fluid nopadding-both">
                        <div id="jam"></div>
                    </div>
                </div>
                <div class="col nopadding-left">
                    <div class="container-fluid nopadding-both">
                        <div id="running-text">
                            <?php $tanggal = date("Y-m-d", strtotime($pagu->tanggal)) ?>
                            <span>Pagu dan Realisasi Belanja BPTD Wil.XXI Prov. Gorontalo ({{$tanggal}}) : Belanja Pegawai ({{$pagu->belanja_pegawai}}%), Belanja Barang ({{$pagu->belanja_barang}}%), Belanja Modal ({{$pagu->belanja_modal}}%), Total ({{$pagu->total}}%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('jam').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
    $(document).ready(function() {
        startTime();
        $('.slick ').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 10000,
            dots: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
    });
</script>

</html>