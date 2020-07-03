<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-warning-sign"></i> </span>
              <h5>Daftar Titik</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Tabel.Kode Rambu</th>
                            <th rowspan="2">Tahun Perolehan</th>
                            <th rowspan="2">Lokasi/Ruas Jalan</th>
                            <th colspan="2">Titik Koordinat</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>N</th>
                            <th>E</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php $__currentLoopData = $titik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($t->tabel_kd); ?></td>
                            <td><?php echo e($t->tahun); ?></td>
                            <td><?php echo e($t->nama); ?></td>
                            <td><?php echo e($t->x); ?></td>
                            <td><?php echo e($t->y); ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
              </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>