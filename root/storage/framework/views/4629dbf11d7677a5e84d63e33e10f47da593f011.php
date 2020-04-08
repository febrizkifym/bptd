

<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $satpel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                <h5><?php echo e($sp->nama); ?></h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pangkat (Golongan)</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                        $sumberdaya = App\Sdm::where('satpel',$sp->id)->get();
                      ?>
                      <?php $__currentLoopData = $sumberdaya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($no++); ?></td>
                          <td class="uppercase"><?php echo e($sdm->nama); ?></td>
                          <td><?php echo e($sdm->pangkat); ?></td>
                          <td class="uppercase"><?php echo e($sdm->jabatan); ?></td>
                          <td>
                              <a href="<?php echo e(route('sdm.edit',$sdm->id)); ?>"><button class="btn btn-info">Edit</button></a>
                              <a href="<?php echo e(route('sdm.delete',$sdm->id)); ?>"><button class="btn btn-danger">Hapus</button></a>
                          </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
    <div class="row-flui">
        <div class="span12">
            <a href="<?php echo e(route('sdm.add')); ?>?satpel=<?php echo e($sp->id); ?>"><button class="btn btn-success">Tambah</button></a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>