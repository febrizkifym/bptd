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
                <!-- foreach -->
                <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="media">
                    <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" class="align-self-start mr-5 news-thumbnail" alt="Thumbnail"></a>
                    <div class="media-body">
                        <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><h5 class="mt-0 header-text"><?php echo e($b->title); ?></h5></a>
                        <h6 class="mt-1"><?php echo e(Carbon::parse($b->post_date)->format('l, j F Y')); ?></h6>
                        <p><?php echo strip_tags(Str::limit($b->content,150)); ?></p>
                    </div>
                </div>
                <div class="garis garis-dark"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md">
                
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new/template/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>