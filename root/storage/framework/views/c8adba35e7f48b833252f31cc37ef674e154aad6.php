<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
?>
<section id="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Selamat Datang di Website</h1>
            <h1 class="header-text display-4">Balai Pengelola Transportasi Darat</h1>
            <h1 class="header-text display-4">Wilayah XXI Provinsi Gorontalo</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="pengumuman">
    <div class="container">
        <div class="row">   
        <div class="col-lg-6">
            <div class="container pengumuman-text">
                <div class="frame">
                    <span>Keselamatan Adalah Tanggung Jawab Kita Bersama</span>
                    <span class="footer">Herman Armanda SE,MT</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="<?php echo e(asset('new/img/kabalainobg.png')); ?>" class="img-fluid" alt="">
        </div>
        </div>
    </div>
</section>
<section id="berita">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 berita-kiri">
                <div class="container">
                    <!-- <div class="frame align-self-center">
                        <span>Keselamatan Adalah Hak Milik Kita Bersama</span>
                    </div> -->
                </div>
            </div>
            <div class="col-md berita-kanan">
                <div class="container">
                    <h2 class="header-text">LENSA KEGIATAN</h2>
                    <div class="garis garis-dark"></div>
                    <!-- foreach -->
                    <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media">
                        <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><img src="<?php echo e(asset('img/post/'.$b->thumbnail)); ?>" class="align-self-start mr-3 news-thumbnail img-thumbnail" alt="Thumbnail"></a>
                        <div class="media-body">
                            <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><h5 class="mt-0"><?php echo e(Str::limit($b->title,100)); ?></h5></a>
                            <p><?php echo strip_tags(Str::limit($b->content,150)); ?></p>
                        </div>
                    </div>
                    <div class="garis garis-dark"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="btn btn-dark btn-berita">Semua Kegiatan BPTD</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="links">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="media links">
                    <img src="<?php echo e(asset('new/img/house.png')); ?>" class="img-fluid link-icon align-self-end mr-3" alt="Link Keselamatan">
                    <div class="media-body">
                        <h5 class="mt-0">Link Keselamatan</h5>
                        <a href="#"><button class="btn btn-links btn-light">Klik Disini</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media links">
                    <img src="<?php echo e(asset('new/img/pin.png')); ?>" class="img-fluid link-icon align-self-end mr-3" alt="Bulotu">
                    <div class="media-body">
                        <h5 class="mt-0">Aplikasi BULOTU</h5>
                        <a href="#"><button class="btn btn-links btn-light">Klik Disini</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media links">
                    <img src="<?php echo e(asset('new/img/mail.png')); ?>" class="img-fluid link-icon align-self-end mr-3" alt="Penomoran Surat">
                    <div class="media-body">
                        <h5 class="mt-0">Penomoran Surat</h5>
                        <a href="#"><button class="btn btn-links btn-light">Klik Disini</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new/template/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>