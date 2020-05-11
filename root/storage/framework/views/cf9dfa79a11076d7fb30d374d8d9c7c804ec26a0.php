<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>PROBADUT - BPTD XXI GORONTALO</title>
    <link rel="shortcut icon" href="<?php echo e(asset('pbd/img/favicon.png')); ?>" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('pbd/css/style.css')); ?>">
</head>
<body>
    <nav class="navbar navbar-dark topnav">
        <div class="container">
            <a class="navbar-brand" href="https://www.bptdxxigorontalo.com">
                <img src="<?php echo e(asset('pbd/img/logokemenhub.svg')); ?>" width="20" height="20" class="d-inline-block align-top" alt="">
                BPTD Wilayah XXI Provinsi Gorontalo
            </a>
        </div>
    </nav>
    <div class="header">
        <div class="container">
            <img src="<?php echo e(asset('pbd/img/header.png')); ?>" alt="Logo Probadut" class="img-fluid img-header">
            <!-- <h1 class="">Proses Birokrasi dan Administrasi yang Transparan Menuju Pelayanan yang Terintegrasi</h1> -->
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-default">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo e(request()->is('probadut') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('probadut.index')); ?>">BERANDA</a>
                    </li>
                    <li class="nav-item  <?php echo e(request()->is('probadut/jadwal*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('probadut.jadwal')); ?>">INFORMASI KAPAL</a>
                    </li>
                    <li class="nav-item <?php echo e(request()->is('probadut/registrasi*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('probadut.registrasi')); ?>">REGISTRASI</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="content">
            <div class="container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            &copy; 2020 Humas BPTD XXI Gorontalo
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>