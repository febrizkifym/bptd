<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;  
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Sejarah</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list" style="line-height:1.8em">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php echo $b->sejarah; ?>

                <div class="garis garis-dark"></div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>