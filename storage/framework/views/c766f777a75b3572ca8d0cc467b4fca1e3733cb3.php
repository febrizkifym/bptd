<?php $__env->startSection('content'); ?>
<section id="satpel">
    <div class="container">
        <div class="post-thumbnail carousel">
            <img src="<?php echo e(asset('storage/img/'.$sp->gambar)); ?>" alt="" class="thumbnail img-fluid" onerror="this.onerror=null;this.src='<?php echo e(asset('img/notfound.png')); ?>';" >
            <div class="carousel-caption post-title">
                <h1 style="margin-bottom:0;"><?php echo e($sp->nama); ?></h1>
                <h1 style="font-size:11pt;padding:5px 0;font-weight:normal"><?php echo e($sp->alamat); ?></h1>
            </div>
        </div>
        <hr>
        <h3>Tugas & Fungsi</h3>
        <div>
            <p><?php echo e($sp->tupoksi); ?></p>
        </div>
        <hr>
        <?php if($sp->struktur): ?>
        <h3>Struktur Organisasi</h3>
        <div class="post-thumbnail carousel">
            <img src="<?php echo e(asset('storage/img/'.$sp->struktur)); ?>" alt="" style="object-fit:contain" class="thumbnail" onerror="this.onerror=null;this.src='<?php echo e(asset('img/notfound.png')); ?>';" >
        </div>
        <hr>
        <?php endif; ?>
        <h3>Sumber Daya Manusia</h3>
        <table class="table table-hover table dataTable table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pangkat (Golongan)</th>
                    <th>Jabatan</th>
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