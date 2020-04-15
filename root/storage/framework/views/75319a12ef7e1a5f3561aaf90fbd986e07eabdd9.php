<?php $__env->startSection('content'); ?>
<section id="sejarah">
    <div class="container">
        <h1>Sejarah BPTD</h1>
        <hr>
        <p>
            <?php echo e($b->sejarah); ?>

        </p>
     </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>