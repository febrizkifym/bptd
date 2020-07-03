<?php $__env->startSection('content'); ?>
<section id="profile-header" class="wisata-header">
    <video autoplay muted loop id="header-vid">
        <source src="<?php echo e(asset('new/video/pantairatu.mp4')); ?>" type="video/mp4">
    </video>
    <!-- <img src="<?php echo e(asset('new/img/torosiaje/1.png')); ?>" alt="" onerror="this.onerror=null;this.src='<?php echo e(asset('img/notfound.png')); ?>';"> -->
    <div class="jumbotron jumbotron-fluid wow fadeInUp whtcontainer">
        <div class="container">
            <h1 class="header-text display-3 ">Pantai Ratu</h1>
        </div>
    </div>
</section>
<section id="wisata-description">
    <div class="container">
        <h1 class="header-text">Wisata Pantai Ratu</h1>
        <div class="garis garis-dark"></div>
        <p>Objek wisata yang menawarkan pemandangan pantai dan alam di sekitarnya, suasana yang sangat nyaman dan aman untuk menikmati alam.</p>
        <p>Wisata pantai ratu didesain dengan koridor kayu yang berdiri di atas pantai dengan kesejukan yang nyaman.</p>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    new WOW().init();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>