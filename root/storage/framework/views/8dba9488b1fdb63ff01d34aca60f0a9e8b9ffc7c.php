<?php            
    use Illuminate\Support\Str;  
    use Carbon\Carbon;
?>
<?php $__env->startSection('meta'); ?>
<?php echo $__env->make('meta::manager', [
    'title'         => $b->title,
    'description'   => strip_tags(Str::limit($b->content,500)),
    'image'         => asset('img/post/'.$b->thumbnail),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <div class="article-header">

                <h2><?php echo e($b->title); ?></h2>
                <small class="tanggal"><?php echo e(Carbon::parse($b->created_at)->format('l, j F Y')); ?></small>
                <img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="<?php echo e(Str::slug($b->title,'-')); ?>" class="img-fluid img-thumbnail">
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
                   <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>"> <img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="" class="thumbnail-img"></a>
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
<?php echo $__env->make('layouts/berita', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>