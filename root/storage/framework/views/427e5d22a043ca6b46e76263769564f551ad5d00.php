<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
              <h5>Calon Penumpang</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Usia</th>
                            <th>Kapal (Tujuan)</th>
                            <th>Kelas/Golongan</th>
                            <th>Tarif</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php $__currentLoopData = $penumpang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($p->uid); ?></td>
                            <td><?php echo e($p->nama); ?></td>
                            <td><?php echo e($p->no_hp); ?></td>
                            <td><?php echo e($p->jenis_kelamin); ?></td>
                            <td style="text-transform:capitalize"><?php echo e($p->agama); ?></td>
                            <td>
                                <?php echo e($p->usia==1?"Dewasa (Lebih dari 12 Tahun)":"Anak-Anak (Kurang dari 12 Tahun)"); ?>

                            </td>
                            <td>
                                <?php echo e($p->kapal); ?>

                            </td>
                            <td style="text-transform:uppercase"><?php echo e($p->kelas); ?></td>
                            <td>Rp. <?php echo e($p->harga); ?></td>
                            <td>
                              <?php if($p->status == 'pending'): ?>
                              <span class="label label-warning">Pending</span>
                              <?php elseif($p->status == 'konfirmasi'): ?>
                              <span class="label label-success">Konfirmasi</span>
                              <?php elseif($p->status == 'batal'): ?>
                              <span class="label label-danger">Batal</span>
                              <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('penumpang.detail',$p->uid)); ?>"><button class="btn btn-mini btn-primary">Detail</button></a>
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
              <div class="widget-title"> <span class="icon"> <i class="icon-table"></i> </span>
              <h5>Export Data</h5>
              </div>
              <div class="widget-content">
                <a href="<?php echo e(route('penumpang.export')); ?>"><button class="btn btn-success">Export Excel</button></a>
              </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>