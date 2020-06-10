<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Data Kapal</h5>
              </div>
              <div class="widget-content nopadding">
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Kapal</th>
                            <td><?php echo e($k->kd_kapal); ?>

                             </td>
                        </tr>
                        <tr>
                            <th>Nama Kapal</th>
                            <td><?php echo e($k->nama); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td><?php echo e($k->tujuan); ?>

                             </td>
                        </tr>
                    </table>
              </div>
    </div>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Data Tarif</h5>
              </div>
              <div class="widget-content nopadding">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Tarif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tarif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($t['nama']); ?></td>
                                <td><?php echo $t['tarif']?"Rp. ".$t['tarif']:"<i>Belum diinput</i>"; ?></td>
                                <td>
                                    <a href="<?php echo e(route('kapal.edit_tarif')); ?>?kapal=<?php echo e($k['id']); ?>&kelas=<?php echo e($t['kelas']); ?>&usia=<?php echo e($t['jenis_usia']); ?>"><button class="btn btn-mini btn-warning">Edit</button></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
              </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>