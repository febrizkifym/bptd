<!DOCTYPE html>
<html lang="en">
<head>
    <title>TV INFORMASI BPTD WIL.XXI PROVINSI GORONTALO</title>
    <link rel="stylesheet" href="css/flipclock.css">
    <style>
        *{
            padding:0;margin:0;
            font-family:'Arial';
        }
        body{
            background:url('img/bgtv.jpg') top left no-repeat;
            background-size:cover;
        }
        #atas,#bawah{
            width:100%;
            float:left;
        }
        #atas{
            height:90vh;
        }
        #bawah{
            height:10vh;
        }
        #kegiatan-wrapper{
            height:100%;
            width:40%;
            float:left;
        }
        #kegiatan-header{
            float:left;
            width:100%;
            height:10%;
            padding-top:15%;
        }
        #kegiatan{
            float:left;
            height:75%;
            width:100%;
            overflow-y:hidden;
        }
        #kegiatan-header h1{
            font-size:3em;
            text-align:center;
            color:#FFF;
            -webkit-text-stroke: 2px black;
            -webkit-text-fill-color: white;
            font-weight:bold;
        }
        #kegiatan table{
            float:left;
            width:100%;
            font-size:1.2em;
            border-collapse:collapse;
            background-color:rgba(255,255,255,0.7);
            max-width:100%;
        }
        #kegiatan-wrapper table,
        #kegiatan-wrapper table tr,
        #kegiatan-wrapper table td,
        #kegiatan-wrapper table th{
            border:2px solid #000;
        }
        #kegiatan-wrapper table td{
            padding:1%;
        }
        table tr th{
            padding:1% 0;
        }
        #video-wrapper{
            height:100%;
            width:60%;
            float:left;
        }
        #video{
            padding:2% 2%;
            height:80%;
        }
        #logo-wrapper{
            height:20%;
            padding:1% 3%;
        }
        .logo{
            width:100%;
        }
        #jam{
            width:30%;
            float:left;
            background-color:rgba(0,0,0,0.7);
            color:#FFF;
            text-align:center;
            font-size:4em;
            padding:0.5% 0;  
        }
        #running-text{
            width:70%;
            height:100%;
            float:left;
            background-color:rgba(255,255,255,0.7);
        }
        #running-text{
            height:100%;
            white-space:nowrap;
            overflow: hidden;
            position: relative;
        }
        #running-text span {
            font-weight:bold;
            font-size:3em;
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 250%;
            text-align: center;
            /* Starting position */
            -moz-transform:translateX(100%);
            -webkit-transform:translateX(100%);	
            transform:translateX(100%);
            /* Apply animation to this element */	
            -moz-animation: scroll-left 20s linear infinite;
            -webkit-animation: scroll-left 20s linear infinite;
            animation: scroll-left 20s linear infinite;
        }
        /* Move it (define the animation) */
        @-moz-keyframes scroll-left {
            0%   { -moz-transform: translateX(100%); }
            100% { -moz-transform: translateX(-100%); }
        }
        @-webkit-keyframes scroll-left {
            0%   { -webkit-transform: translateX(100%); }
            100% { -webkit-transform: translateX(-100%); }
        }
        @keyframes scroll-left {
            0%   { 
            -moz-transform: translateX(100%); /* Browser bug fix */
            -webkit-transform: translateX(100%); /* Browser bug fix */
            transform: translateX(100%); 		
            }
            100% { 
            -moz-transform: translateX(-100%); /* Browser bug fix */
            -webkit-transform: translateX(-100%); /* Browser bug fix */
            transform: translateX(-100%); 
            }
        }
    </style>
</head>
<body>
    <div id="atas">
        <div id="kegiatan-wrapper">
            <div id="kegiatan-header">
                <img src="img/kegiatan_header.png" alt="" class="logo">
            </div>
            <div id="kegiatan">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php use Carbon\Carbon;$no=1; ?>
                    @for($i=0;$i<6;$i++)
                    <tr>
                        <td align=center>{{$no++}}</td>
                        <td width=40%>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis iure totam eius soluta, dolor natus error officiis fugiat!</td>
                        <td align=center>{{Carbon::now()->year.'-'.Carbon::now()->month.'-'.Carbon::now()->day}}</td>
                        <td align=center>-</td>
                    </tr>
                    @endfor
                </table>
            </div>
        </div>
        <div id="video-wrapper">
            <div id="logo-wrapper">
                <img src="img/logotv.png" alt="" class="logo">
            </div>
            <div id="video">
                <iframe width="100%" height="90%" src="https://www.youtube.com/embed/Fq7-sXwm_58?controls=0&autoplay=1&loop=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div id="bawah">
        <div id="jam">
        </div>
        <div id="running-text">
            <span>AKSI SOSIAL Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo #nopiknik #nomudik #nopanik</span>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<!-- <script src="js/flipclock.js"></script> -->
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
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
    }
    $(document).ready(function(){
        startTime();
    });
</script>    
</html>