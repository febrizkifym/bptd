<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <div class="article-header">
               <?php
                
                use Carbon\Carbon;
                
                ?>
                <h2><?php echo e($b->title); ?></h2>
                <small class="tanggal"><?php echo e(Carbon::parse($b->created_at)->format('l, j F Y')); ?></small>
                <img src="<?php echo e(url('storage/img/post').'/'.$b->thumbnail); ?>" alt="" class="img-fluid img-thumbnail">
            </div>
            <div class="article-content">
                <?php echo $b->content; ?>

            </div>
        </div>
        <div class="col-md-4">
            <h3 class="label-section">TERKINI</h3>
            <p class="border-role"></p>
             <?php $__currentLoopData = $terpopuler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="feed clearfix">
                <div class="feed-thumbnail">
                   <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>"> <img src="<?php echo e(url('storage/img/post').'/'.$t->thumbnail); ?>" alt="" class="thumbnail-img"></a>
                </div>
                <div class="feed-content">
                    <span class="feed-date"><?php echo e(Carbon::parse($t->created_at)->format('l, j F Y')); ?></span>
                    <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>" class="feed-link"><h5 class="feed-title"><?php echo e($t->title); ?></h5></a>
                </div>
            </div>
            <p class="border-role"></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>