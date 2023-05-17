<?php $__env->startSection('content'); ?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Laporan Survey Kepuasan Masyarakat (SKM)</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
       <h2>Laporan SKM Tahun 2023</h2>
       <h4>Laporan SKM Tahun 2023 Kantor Induk BPTD Gorontalo</h4>
       <p><img src="<?php echo e(asset('new/img/skm2023_bptd_t1.png')); ?>" alt=""></p>
       <a href="#">Laporan SKM Tahun 2023 Triwulan I (Januari-Maret)</a>
       <hr>
       <h4>Laporan SKM Tahun 2023 Pelabuhan Penyeberangan Gorontalo</h4>
       <p><img src="<?php echo e(asset('new/img/skm2023_ppg_t1.png')); ?>" alt=""></p>
       <a href="#">Laporan SKM Tahun 2023 Triwulan I (Januari-Maret)</a>
       <hr>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>