<?php $__env->startSection('content'); ?>
<?php            
    use Illuminate\Support\Str;  
    use Carbon\Carbon;
?>
<section id="profile-header">
    <img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="<?php echo e(Str::slug($b->title,'-')); ?>"  alt="">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h5 class="header-text display-5"><?php echo e(Carbon::parse($b->post_date)->format('l, j F Y')); ?></h5>
            <h1 class="header-text display-4"><?php echo e($b->title); ?></h1>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9 news-description">
                <img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="" class="img-fluid">
                <div class="garis garis-dark"></div>
                <?php echo $b->content; ?>

            </div>
            <div class="col-md">
                
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new/template/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>