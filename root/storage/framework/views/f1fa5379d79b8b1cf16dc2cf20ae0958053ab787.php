<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                <h5>Kegiatan</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                      ?>
                      <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($no++); ?></td>
                          <td><?php echo e($k->kegiatan); ?></td>
                          <td><?php echo e($k->date); ?></td>
                          <td><?php echo e($k->keterangan); ?></td>
                          <td></td>
                          <td>
                            <a href="<?php echo e(route('tvinformasi.kegiatan_edit',$k->id)); ?>"><button class="btn btn-warning btn-mini">Edit</button></a>
                            <a href="<?php echo e(route('tvinformasi.kegiatan_delete',$k->id)); ?>"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
                    <form action="<?php echo e(route('tvinformasi.kegiatan_post')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Kegiatan</th>
                                <td>
                                    <input type="text" name="kegiatan" class="form-control" value="<?php echo e(old('kegiatan')); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <td>
                                    <input type="date" name="date" class="form-control" value="<?php echo e(old('date')); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="keterangan" class="form-control" value="<?php echo e(old('keterangan')); ?>"> 
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