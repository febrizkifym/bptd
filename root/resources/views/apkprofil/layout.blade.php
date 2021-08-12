<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#fff" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('bootstrap4/css/bootstrap.min.css')}}">
    <link href="{{asset('dashboard/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <script src="{{asset('bootstrap4/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('bootstrap4/js/bootstrap.min.js')}}"></script>
    <!--  -->
    <link rel="stylesheet" href="{{asset('asset_apk/style.css')}}">
    <script src="{{asset('asset_apk/script.js')}}"></script>
    <title>Document</title>
</head>
<body>
<div class="wrapper">
        <!-- Sidebar  -->
        @if($sidebar==true)
        <nav id="sidebar" class="fixed-top">
            <ul class="list-unstyled components">
                <li>
                    <a class="sidebarCollapse back-btn">
                        <i class="icon icon-share-alt"></i>
                    </a>
                </li>
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li>
                    <a href="#">Tentang</a>
                </li>
            </ul>
        </nav>
        @endif
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    @if($sidebar==true)
                    <button type="button" class="btn btn-main sidebarCollapse">
                        <i class="icon icon-reorder"></i>
                    </button>
                    @else
                    <a href="{{$back_link}}">
                        <button type="button" class="btn btn-main">
                            <i class="icon icon-arrow-left"></i>        
                        </button>
                    </a>
                    @endif
                    <span class="navbar-brand mx-auto">
                        <img src="{{asset('asset_apk/kemenhub.svg')}}" width="30px" height="30px" alt="">
                    </span>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
</body>
</html>