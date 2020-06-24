<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
    use App\Galeri;
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Galeri Foto</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h4 class="header-text display-5"><?php echo e($b->title); ?></h4>
        <h6 class="header-text display-5"><?php echo e(Carbon::parse($b->post_date)->format('l, j F Y')); ?></h6>
        <div class="garis garis-dark"></div>
        <div class="row">
            <?php
                $galeri = Galeri::where('id_berita',$b->id)->get();
            ?>
            <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="<?php echo e(asset('img/galeri/'.$g->path)); ?>" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo e(asset('img/galeri/'.$g->path)); ?>" alt="">
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new/template/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>