<?php $__env->startSection('content'); ?>

<div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Edit Tarif</h5>
              </div>
              <div class="widget-content">
              <?php
                $kapal = App\Kapal::find($id_kapal);
              ?>
              <form action="<?php echo e(route('kapal.tarif_update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Kapal</th>
                            <td>
                                <input type="hidden" name="id_kapal" value="<?php echo e($id_kapal); ?>">
                                <input type="text" name="nama" class="form-control" value="<?php echo e($kapal->nama); ?>" readonly> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>
                                <input type="text" name="tujuan" class="form-control" value="<?php echo e($kapal->tujuan); ?>" readonly> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kelas/Golongan</th>
                            <td>
                                <input type="text" name="kelas" class="form-control" value="<?php echo e($kelas); ?>" readonly> 
                            </td>
                        </tr>
                        <?php if($jenis_usia): ?>
                        <tr>
                            <th>Klasifikasi Usia</th>
                            <td>
                                <select name="jenis_usia" id="jenis_usia" class="form-control" readonly>
                                    <option value="1" <?php echo e($jenis_usia=="1"?'selected':''); ?>>Dewasa</option>
                                    <option value="2" <?php echo e($jenis_usia=="2"?'selected':''); ?>>Anak-Anak</option>
                                </select>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th>Tarif</th>
                            <td>
                                <div class="input-prepend"> <span class="add-on">Rp.</span>
                                    <?php if(isset($t)): ?>
                                    <input type="text" placeholder="" name="harga" class="span10" value="<?php echo e($t->harga); ?>">
                                    <?php else: ?>
                                    <input type="text" placeholder="" name="harga" class="span10" value="">
                                    <?php endif; ?>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                                <a href="<?php echo e(route('kapal.detail',$id_kapal)); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                            </td>
                        </tr>
                    </table>
                    </form>
              </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>