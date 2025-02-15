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
<?php $__env->startSection('title'); ?>
<?php echo e($b->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
            <h4 class="header-text">Kegiatan Terkini</h4>
            <div class="garis garis-dark"></div>
            <?php $__currentLoopData = $terkini; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="feed clearfix">
                    <div class="row">
                        <div class="col-lg-12 feed-thumbnail">
                            <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>"><img src="<?php echo e(asset('img/post/'.$t->thumbnail)); ?>" alt="" class="thumbnail-img img-fluid"></a>
                        </div>
                        <div class="col-lg-12 feed-content">
                            <span class="feed-date"><?php echo e(Carbon::parse($t->post_date)->format('l, j F Y')); ?></span>
                            <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>" class="feed-link"><h5 class="feed-title"><?php echo e($t->title); ?></h5></a>
                            <p><?php echo strip_tags(Str::limit($t->content,150)); ?></p>
                        </div>
                    </div>
                </div>
                <div class="garis garis-dark"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>