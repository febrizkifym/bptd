<?php $__env->startSection('content'); ?>
<div class="row-fluid">
    <div class="span12">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-envelope"></i> </span>
        <h5>Klasifikasi Surat</h5>
        </div>
        <div class="widget-content nopadding">
        <div class="table-responsive" style="overflow-x:auto">
            <table class="table table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Klasifikasi</th>
                        <th>Kode Surat</th>
                        <th>Sub</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php $__currentLoopData = $klasifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($k->klasifikasi); ?></td>
                        <td><?php echo e($k->kode); ?></td>
                        <td><?php echo e($k->sub); ?></td>
                        <td><?php echo e($k->keterangan); ?></td>
                        <td>
                        <?php if(Auth::user()->role == 'admin'): ?>
                            <a href="<?php echo e(route('surat.klasifikasi_edit',$k->id)); ?>"><button class="btn btn-warning btn-mini">Edit</button></a>
                            <a href="<?php echo e(route('surat.klasifikasi_delete',$k->id)); ?>"><button class="btn btn-danger btn-mini">Hapus</button></a>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><h5>Tambah Data</h5></div>
            <div class="widget-content nopadding">
                <form action="<?php echo e(route('surat.klasifikasi_post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Klasifikasi</th>
                            <td>
                                <input type="text" name="klasifikasi" class="form-control" value="<?php echo e(old('klasifikasi')); ?>" placeholder="Contoh: KEUANGAN" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kode (Pokok Masalah)</th>
                            <td>
                                <input type="text" name="kode" class="form-control" value="<?php echo e(old('kode')); ?>" placeholder="Contoh: KU" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Sub (Sekunder dan Tertier)</th>
                            <td>
                                <input type="text" name="sub" class="form-control" value="<?php echo e(old('sub')); ?>" placeholder="Contoh: 001" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input type="text" name="keterangan" class="form-control" value="<?php echo e(old('keterangan')); ?>" placeholder="Contoh: Perencanaan Anggaran" required> 
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