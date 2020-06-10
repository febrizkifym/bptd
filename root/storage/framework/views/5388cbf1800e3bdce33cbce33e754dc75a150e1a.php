<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Daftar Kapal</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kapal</th>
                            <th>Nama Kapal</th>
                            <th>Tujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($k->kd_kapal); ?></td>
                            <td><?php echo e($k->nama); ?></td>
                            <td><?php echo e($k->tujuan); ?></td>
                            <td>
                                <a href="<?php echo e(route('kapal.detail',$k->id)); ?>"><button class="btn btn-info">Detail</button></a>
                                <a href="<?php echo e(route('kapal.edit',$k->id)); ?>"><button class="btn btn-warning">Edit</button></a>
                                <a href="<?php echo e(route('kapal.delete',$k->id)); ?>"><button class="btn btn-danger">Hapus</button></a>
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
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Tambah Data</h5>
              </div>
              <div class="widget-content">
                
              <form action="<?php echo e(route('kapal.post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Kapal</th>
                            <td>
                                <input type="text" name="kd_kapal" class="form-control" value="<?php echo e(old('kd_kapal')); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Kapal</th>
                            <td>
                                <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama')); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>
                                <input type="text" name="tujuan" class="form-control" value="<?php echo e(old('tujuan')); ?>" required> 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>