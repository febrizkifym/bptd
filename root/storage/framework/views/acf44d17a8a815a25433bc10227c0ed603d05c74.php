<?php $__env->startSection('content'); ?>

<div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Edit Data</h5>
              </div>
              <div class="widget-content">
                
              <form action="<?php echo e(route('kapal.update',$k->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Kapal</th>
                            <td>
                                <input type="text" name="kd_kapal" class="form-control" value="<?php echo e($k->kd_kapal); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Kapal</th>
                            <td>
                                <input type="text" name="nama" class="form-control" value="<?php echo e($k->nama); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>
                                <input type="text" name="tujuan" class="form-control" value="<?php echo e($k->tujuan); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Hari Berangkat</th>
                            <td>
                                <select name="berangkat" id="berangkat" class="form-control">
                                    <option value="1">Senin</option>
                                    <option value="2">Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4">Kamis</option>
                                    <option value="5">Jumat</option>
                                    <option value="6">Sabtu</option>
                                    <option value="7">Minggu</option>
                                </select> 
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