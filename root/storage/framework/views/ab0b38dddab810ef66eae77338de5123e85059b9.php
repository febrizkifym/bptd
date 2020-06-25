<?php $__env->startSection('content'); ?>
<section id="profile-header">
    <img src="<?php echo e(asset('img/'.$sp->gambar)); ?>" alt="" onerror="this.onerror=null;this.src='<?php echo e(asset('img/notfound.png')); ?>';">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-4"><?php echo e($sp->nama); ?></h1>
            <h1 class="header-text display-5"><?php echo e($sp->alamat); ?></h1>
        </div>
    </div>
</section>
<section id="profile-description">
    <div class="container">
        <h1 class="header-text">Tugas dan Fungsi</h1>
        <div class="garis"></div>
        <?php echo $sp->tupoksi; ?>

        <div class="garis garis-dark"></div>
        <?php if($sp->struktur): ?>
        <h1 class="header-text">Struktur Organisasi</h1>
        <div class="garis"></div>
        <a href="<?php echo e(asset('img/'.$sp->struktur)); ?>"><img src="<?php echo e(asset('img/'.$sp->struktur)); ?>" alt="" class="img-fluid"></a>
        <div class="garis garis-dark"></div>
        <?php endif; ?>
    </div>
</section>
<section id="profile-sdm">
    <div class="container">
        <h1 class="header-text">Sumber Daya Manusia</h1>
        <div class="garis"></div>
        <table class="table">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>Nama</td>
                    <td>Pangkat (Golongan)</td>
                    <td>Jabatan</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $sdm = App\Sdm::where('satpel',$sp->id)->get();
                ?>
                <?php $__currentLoopData = $sdm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($s->nama); ?></td>
                    <td><?php echo e($s->pangkat); ?></td>
                    <td><?php echo e($s->jabatan); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>