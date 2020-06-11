<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
?>
<section id="first">
    <div class="container">
        <div class="index-box">
            <div class="row">
                <div class="col-md-5 left">
                    <div class="container">
                        <h4>Selamat Datang di Website Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</h4>
                        <p>
                            <?php echo e($b->teks); ?>

                        </p>
                        <!-- <a href="<?php echo e(route('sejarah')); ?>"><button class="btn btn-light">Sejarah BPTD</button></a> -->
                    </div>
                </div>
                <div class="col-md-7 right">
                    <img src="<?php echo e(asset('img/bgfirst.png')); ?>" alt="wisata gorontalo" class="header-img img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="pengumuman">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="section-title">Pengumuman</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container" style="text-align:center">
                    <a href="<?php echo e(asset('img/'.$b->pengumuman)); ?>"><img src="<?php echo e(asset('img/'.$b->pengumuman)); ?>" alt="Pengumuman BPTD" class="img-fluid pengumuman-img"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if($berita->count() >= 3): ?>
<section id="third">
    <div class="container">
    <div class="row">
            <div class="col-md-12">
                <h4 class="section-title">Lensa Kegiatan</h4>
                <hr>
            </div>
        </div>
            <div class="row">
                <div class="card-deck" style="margin-bottom:15px">
                       <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card artikel">
                            <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>">
                            <img class="card-img-top artikel-thumbnail" src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" alt="Card image cap">    
                            </a>
                            <div class="card-body">
<!--                                <a href="#" class="card-tag">Event</a>-->
                                <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>" class="artikel-link">
                                    <h5 class="card-title"><?php echo e(Str::limit($b->title,100)); ?></h5>
                                </a>
                                <p class="card-text"><small class="text-muted"><?php echo e(Carbon::parse($b->post_date)->format('l, j F Y')); ?></small></p>
                                <!-- <p class="card-text"><?php echo strip_tags(Str::limit($b->content,150)); ?></p> -->
                                <!-- <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>" class="btn btn-sm btn-secondary">Selengkapnya</a> -->
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-md-12">
                <a href="<?php echo e(route('berita')); ?>"><button class="btn btn-dark">Lihat Semua Kegiatan</button></a>
                    </div>
                    
            </div>
        </div>
</section>
<?php endif; ?>
<section id="links">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="media links">
                    <img src="<?php echo e(asset('img/link_keselamatan.png')); ?>" class="align-self-end mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Link Keselamatan</h5>
                        <a href="<?php echo e(route('link_keselamatan')); ?>"><button class="btn btn-primary btn-links">Klik Disini</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media links">
                    <img src="<?php echo e(asset('img/link_bulotu.png')); ?>" class="align-self-end mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Aplikasi "BULOTU"</h5>
                        <a href="<?php echo e(route('probadut.index')); ?>"><button class="btn btn-primary btn-links">Klik Disini</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media links">
                    <img src="<?php echo e(asset('img/link_surat.png')); ?>" class="align-self-end mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Penomoran Surat</h5>
                        <a href="<?php echo e(route('surat.index')); ?>"><button class="btn btn-primary btn-links">Klik Disini</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>