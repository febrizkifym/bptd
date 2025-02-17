<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Kegiatan BPTD</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h4 class="header-text">Kegiatan Terbaru</h4>
                <div class="garis garis-dark"></div>
                <!-- foreach -->
                <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="feed clearfix">
                    <div class="row">
                        <div class="col-lg-3 feed-thumbnail">
                            <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="" class="thumbnail-img img-fluid"></a>
                        </div>
                        <div class="col-lg-9 feed-content">
                            <span class="feed-date"><?php echo e(Carbon::parse($b->post_date)->formatLocalized('%A, %d %B %Y')); ?></span>
                            <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>" class="feed-link"><h5 class="feed-title"><?php echo e($b->title); ?></h5></a>
                            <p><?php echo strip_tags(Str::limit($b->content,150)); ?></p>
                        </div>
                    </div>
                </div>
                <div class="garis garis-dark"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="pagination">
                    <?php echo e($berita->links()); ?>

                </div>
            </div>
            <div class="col-md">
                <h4 class="header-text">Kegiatan Terpopuler</h4>
                <div class="garis garis-dark"></div>
                <?php $__currentLoopData = $terpopuler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="feed clearfix">
                    <div class="row">
                        <div class="col-lg-12 feed-thumbnail">
                            <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>"><img src="<?php echo e(asset('img/post/'.$t->thumbnail)); ?>" alt="" class="thumbnail-img img-fluid"></a>
                        </div>
                        <div class="col-lg-12 feed-content">
                            <span class="feed-date"><?php echo e(Carbon::parse($t->post_date)->formatLocalized('%A, %d %B %Y')); ?></span>
                            <a href="<?php echo e(route('single',[$t->id,$t->slug])); ?>" class="feed-link"><h6 class="feed-title"><?php echo e($t->title); ?></h6></a>
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