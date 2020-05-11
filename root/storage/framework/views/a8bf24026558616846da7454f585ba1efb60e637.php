<?php $__env->startSection('content'); ?>
    <center>
        <img src="<?php echo e(asset('pbd/img/kmpmoinit.png')); ?>" alt="KMP Moinit" class="img-fluid">
    <h1>Informasi Kapal</h1>
    <hr>
    <a href="<?php echo e(asset('pbd/img/jadwalkmp.jpeg')); ?>">
        <img src="<?php echo e(asset('pbd/img/jadwalkmp.jpeg')); ?>" alt="Jadwal dan Tarif" class="img-fluid">
    </a>
    </center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/probadut', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>