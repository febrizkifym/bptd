<?php $__env->startSection('content'); ?>
<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Tabel Satuan Pelayanan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Satpel</th>
                    <th>Alamat</th>
                    <th>Tupoksi</th>
                    <th>Struktur</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                 <tr>
                  <?php $__currentLoopData = $satpel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td><?php echo e($sp->id); ?></td>
                  <td><?php echo e($sp->nama); ?></td>
                  <td>
                          <?php if($sp->alamat): ?>
                          <?php echo e($sp->alamat); ?>

                          <?php else: ?>
                     <center>
                          <span class="badge badge-important"><i class="icon-remove"></i></span>
                     </center>
                          <?php endif; ?>
                  </td>
                  <td>
                     <center>
                          <?php if($sp->tupoksi): ?>
                          <span class="badge badge-success"><i class="icon-ok"></i></span>
                          <?php else: ?>
                          <span class="badge badge-important"><i class="icon-remove"></i></span>
                          <?php endif; ?>
                     </center>
                  </td>
                  <td>
                     <center>
                          <?php if($sp->struktur): ?>
                          <span class="badge badge-success"><i class="icon-ok"></i></span>
                          <?php else: ?>
                         <span class="badge badge-important"><i class="icon-remove"></i></span>
                          <?php endif; ?>
                     </center>
                  </td>
                  <td>
                     <center>
                          <?php if($sp->gambar): ?>
                          <span class="badge badge-success"><i class="icon-ok"></i></span>
                          <?php else: ?>
                         <span class="badge badge-important"><i class="icon-remove"></i></span>
                          <?php endif; ?>
                     </center>
                  </td>
                  <td>
                     <center>
                          <a href="<?php echo e(route('satpel.detail',$sp->id)); ?>"><button class="btn btn-info">Detail</button></a>
                     </center>
                  </td>
                </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
<div class="row-flui">
    <div class="span12">
        <a href="<?php echo e(route('satpel.add')); ?>"><button class="btn btn-success">Tambah</button></a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>