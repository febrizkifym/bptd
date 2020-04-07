<?php $__env->startSection('content'); ?>

                      <?php
                            use Illuminate\Support\Str;
                            use Carbon\Carbon;  
                        ?>
<section class="indexsection carousel" id="first">
    <div class="row" style="margin:0">
        <div class="col-md-4" style="background-color:#232464;">
            <div class="container" style="padding:25% 5%;">
                    <h4>Selamat Datang di Website Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</h4>
                    <p>
                        Balai Pengelola Transportasi Darat atau disingkat BPTD dibentuk pada tanggal 30 Desember 2016 berdasarkan Peraturan Menteri Perhubungan Nomor 154 Tahun 2016 dan merupakan Unit Pelaksana Teknis di lingkungan Kementerian Perhubungan berada di bawah dan bertanggung jawab kepada Menteri Perhubungan melalui Direktur Jenderal Perhubungan Darat
                    </p>
                    <a href="<?php echo e(route('sejarah')); ?>"><button class="btn btn-secondary">Sejarah BPTD</button></a>
                    <!-- <img src="<?php echo e(asset('img/hubdat.png')); ?>" class="img-fluid" alt=""> -->
            </div>
        </div>
        <div class="col-md-8" style="padding:0">
            <img src="img/bgfirst.png" alt="" class="img-fluid img-bg">
        </div>
    </div>
</section>
<section id="pengumuman" class="indexsection">
    <div class="container">
        <h3>Pengumuman</h3>
        <hr>
        <a href="<?php echo e(asset('img/pengumuman.jpeg')); ?>"><img src="<?php echo e(asset('img/pengumuman.jpeg')); ?>" alt="" class="img-fluid"></a>
    </div>
</section>
<div class="container">
<!-- <section class="indexsection" id="second">
   <div class="container">
       <div class="row">
           <div class="col-md-4">
               <img src="img/circle1.png" alt="" class="img-fluid img-page">
           </div>
           <div class="col-md-8" style="padding-top:50px">
                <h3>Balai Pengelola Transportasi Darat</h3>
                <hr>
                <p>Balai Pengelola Transportasi Darat atau disingkat BPTD dibentuk pada tanggal 30 Desember 2016 berdasarkan Peraturan Menteri Perhubungan Nomor 154 Tahun 2016 dan mulai melaksanakan tugas secara resmi pada tanggal 21 Juli 2017... <a href="<?php echo e(route('sejarah')); ?>">Selengkapnya</a></p>
           </div>
       </div>
   </div>
</section> -->
</div>
<?php if($berita->count() == 3): ?>
<section class="indexsection" id="third">
    <div class="container">
    <h3>Lensa Kegiatan BPTD</h3>
        <hr>
            <div class="row">
                <div class="card-deck">
                       <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card artikel">
                            <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>">
                            <img class="card-img-top artikel-thumbnail" src="<?php echo e(url('storage/img/post').'/'.$b->thumbnail); ?>" alt="Card image cap">    
                            </a>
                            <div class="card-body">
<!--                                <a href="#" class="card-tag">Event</a>-->
                                <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>" class="artikel-link">
                                    <h5 class="card-title"><?php echo e(Str::limit($b->title,50)); ?></h5>
                                </a>
                                <p class="card-text"><small class="text-muted"><?php echo e(Carbon::parse($b->created_at)->format('l, j F Y')); ?></small></p>
                                <!-- <p class="card-text"><?php echo strip_tags(Str::limit($b->content,150)); ?></p> -->
                                <!-- <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>" class="btn btn-sm btn-secondary">Selengkapnya</a> -->
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>