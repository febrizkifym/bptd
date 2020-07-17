<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-money"></i> </span>
                <h5>Pagu & Realisasi Belanja</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Belanja Pegawai</th>
                        <th>Belanja Barang</th>
                        <th>Belanja Modal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                      ?>
                      <?php $__currentLoopData = $pagu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($no++); ?></td>
                          <td><?php echo e($p->tanggal); ?></td>
                          <td><?php echo e($p->belanja_pegawai); ?>%</td>
                          <td><?php echo e($p->belanja_barang); ?>%</td>
                          <td><?php echo e($p->belanja_modal); ?>%</td>
                          <td><?php echo e($p->total); ?>%</td>
                          <td>
                            <a href="<?php echo e(route('tvinformasi.pagu_edit',$p->id)); ?>"><button class="btn btn-warning btn-mini">Edit</button></a>
                            <a href="<?php echo e(route('tvinformasi.pagu_delete',$p->id)); ?>"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
                    <form action="<?php echo e(route('tvinformasi.pagu_post')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <td>
                                    <input type="date" name="tanggal" class="form-control" value="<?php echo e(date('Y-m-j')); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Pegawai</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_pegawai" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Barang</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_barang" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Modal</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_modal" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="total" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
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