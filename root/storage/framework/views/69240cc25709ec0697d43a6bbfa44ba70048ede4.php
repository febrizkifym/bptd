<?php $__env->startSection('content'); ?>
<div class="row-fluid">
        <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-arrow-up"></i> </span>
            <h5>Daftar Ruas</h5>
            </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Daerah</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php $__currentLoopData = $ruas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($r->nama); ?></td>
                        <td><?php echo e($r->daerah); ?></td>
                        <td><?php echo e($r->kecamatan); ?></td>
                        <td>
                            <a href="<?php echo e(route('dalalo.ruas_detail',$r->id)); ?>"><button class="btn btn-info">Detail</button></a>
                            <a href="<?php echo e(route('dalalo.ruas_delete',$r->id)); ?>"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><h5>Tambah Data</h5></div>
            <div class="widget-content">
                <form action="<?php echo e(route('dalalo.ruas_post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Ruas</th>
                            <td>
                                <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama')); ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <th>Daerah</th>
                            <td>
                                <input type="text" name="daerah" class="form-control" placeholder="Kabupaten/Kota ..." value="<?php echo e(old('daerah')); ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>
                                <input type="text" name="kecamatan" class="form-control" value="<?php echo e(old('kecamatan')); ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>