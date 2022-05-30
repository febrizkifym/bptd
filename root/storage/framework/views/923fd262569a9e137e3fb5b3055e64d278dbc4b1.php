<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo e(asset('new/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('new/css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="<?php echo e(asset('new/js/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('new/js/jquery-3.5.1.min.js')); ?>"></script> 
    <script>
    $(document).ready(function(){
        $(".preloader").fadeOut();
    })
    </script>
    <style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99999;
        background-color: #fff;
    }
    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
    }
    </style>  
    <?php echo $__env->yieldContent('style'); ?>
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/png" sizes="16x16">
    <title><?php echo $__env->yieldContent('title', 'Website Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo'); ?></title>
    <?php echo $__env->make('meta::manager', [
    'title'         => 'Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo',
    'description'   => 'Balai Pengelola Transportasi Darat atau disingkat BPTD dibentuk pada tanggal 30 Desember 2016 berdasarkan Peraturan Menteri Perhubungan Nomor 154 Tahun 2016 dan merupakan Unit Pelaksana Teknis di lingkungan Kementerian Perhubungan berada di bawah dan bertanggung jawab kepada Menteri Perhubungan melalui Direktur Jenderal Perhubungan Darat',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('meta'); ?>
    <!--
    ======================================
    |                                    |
    | Made By    : Febrizki Mawikere     |
    | Email      : febrizkifym@gmail.com |
    | Insta      : @febrizkifym_                  |
    |                                    |
    ======================================
    -->
</head>
<body>
<div class="preloader">
  <div class="loading">
    <img src="<?php echo e(asset('new/img/loading.gif')); ?>" class="img-fluid" width="">
  </div>
</div>
<header>
        <nav class="navbar first-navbar fixed-top navbar-expand-lg navbar-light bg-light container">
            
            <a href="#" class="navbar-brand img-logo">
                <img src="<?php echo e(asset('new/img/header.png')); ?>" alt="Header Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('beranda')); ?>">Beranda</a>
                    </li>

                    <li class="nav-item dropdown position-static <?php echo e(request()->is('profil*') ? 'active' : ''); ?>"><a href="#" class="nav-link dropdown-toggle <?php echo e(request()->is('profil*') ? 'active' : ''); ?>" data-toggle="dropdown" data-target="#">Profil</a>
                    <!-- div.w-100 make it mega menu, div.top-auto opens the mega menu exactly as position like other normal menu -->
                    <div class="dropdown-menu w-100 top-auto">
                        <div class="container">
                            <!-- div.w-100 is also needed in certain circumstances to make this menu a mega menu -->
                            <div class="row w-100">
                                <div class="text-center col-sm-4 mega-menu">
                                    <h4 class="border border-top-0 border-right-0 border-left-0 mega-menu-header">BPTD</h4>
                                    <?php
                                    use Illuminate\Support\Str;
                                    ?>
                                    <?php $__currentLoopData = App\Satpel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('satpel',[$sp->id,Str::slug($sp->nama,'-')])); ?>" class="dropdown-item"><?php echo e(Str::limit($sp->nama,28)); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="text-center col-sm-4 mega-menu">
                                    <h4 class="border border-top-0 border-right-0 border-left-0 mega-menu-header">Profil BPTD</h4>
                                    <a href="<?php echo e(route('visimisi')); ?>" class="dropdown-item">Visi-Misi BPTD</a>
                                    <a href="#" class="dropdown-item disabled">Sejarah BPTD</a>
                                </div>
                            <div class="text-center col-sm-4 mega-menu">
                                <h4 class="border border-top-0 border-right-0 border-left-0 mega-menu-header">Profil Wisata Gorontalo</h4>
                                <a href="<?php echo e(route('wisata.torosiaje')); ?>" class="dropdown-item">Wisata Desa Torosiaje</a>
                                <a href="<?php echo e(route('wisata.pantairatu')); ?>" class="dropdown-item">Wisata Pantai Ratu</a>
                            </div>
                        </div>
                    </div>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('kegiatan*') ? 'active' : ''); ?>" href="<?php echo e(route('berita')); ?>">Kegiatan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->is('galeri*') ? 'active' : ''); ?>" href="#" id="galeri" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Galeri
                        </a>
                        <div class="dropdown-menu" aria-labelledby="galeri">
                            <a class="dropdown-item" href="<?php echo e(route('galeri')); ?>">Foto</a>
                            <a class="dropdown-item" href="<?php echo e(route('galeri-video')); ?>">Video</a>
                        </div>
                    </li>
                    <?php if(Auth::check()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(Auth::user()->username); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="login">
                            <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('login*') ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
</header>
<?php echo $__env->yieldContent('content'); ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="lead">Lensa</span>
                <hr>
                <ul class="list-unstyled">
                    <li><a href="#">Galeri Foto</a></li>
                    <li><a href="#">Galeri Video</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <span class="lead">Social Media</span>
                <hr>
                <ul class="list-unstyled">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Youtube</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <span class="lead">Kontak Kami</span>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <p>Kantor BPTD Wilayah XXI Provinsi Gorontalo</p>
                        <p>(0435) 8532 847</p>
                        <p>bptdgorontalo@gmail.com</p>
                        <p>Jl. Beringin, Kec. Dungingi, Kota Gorontalo</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>Copyright &copy; 2020. HUMAS Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</p>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo e(asset('new/js/bootstrap.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.dataTables.min.js')); ?>"></script> 
<script src="<?php echo e(asset('new/js/main.js')); ?>"></script>   
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>