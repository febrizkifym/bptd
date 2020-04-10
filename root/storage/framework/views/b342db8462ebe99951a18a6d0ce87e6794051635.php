<?php echo $__env->make('meta::manager', [
    'title'         => 'Balai Pengelola Transportasi Darat',
    'description'   => 'Balai Pengelola Transportasi Darat atau disingkat BPTD dibentuk pada tanggal 30 Desember 2016 berdasarkan Peraturan Menteri Perhubungan Nomor 154 Tahun 2016 dan merupakan Unit Pelaksana Teknis di lingkungan Kementerian Perhubungan berada di bawah dan bertanggung jawab kepada Menteri Perhubungan melalui Direktur Jenderal Perhubungan Darat',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row article">
        <div class="col-md-8">
            <h3 class="label-section">TERKINI</h3>
            <p class="border-role"></p>
                      <?php
                            use Illuminate\Support\Str;
                            use Carbon\Carbon;  
                        ?>
                       <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="feed clearfix">
                            <div class="feed-thumbnail">
                                <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="" class="thumbnail-img"></a>
                            </div>
                            <div class="feed-content">
                                <span class="feed-date"><?php echo e(Carbon::parse($b->created_at)->format('l, j F Y')); ?></span>
                                <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>" class="feed-link"><h5 class="feed-title"><?php echo e($b->title); ?></h5></a>
                                <p><?php echo strip_tags(Str::limit($b->content,150)); ?></p>
                            </div>
                        </div>
                        <p class="border-role"></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-md-4">
            <h3 class="label-section">TERPOPULER</h3>
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
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>