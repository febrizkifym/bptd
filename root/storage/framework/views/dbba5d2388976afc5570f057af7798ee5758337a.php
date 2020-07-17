<?php $__env->startSection('content'); ?> 
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><h5>Edit Data</h5></div>
                <div class="widget-content">
                    <form action="<?php echo e(route('tvinformasi.pagu_update',$p->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <td>
                                    <input type="date" name="tanggal" class="form-control" value="<?php echo e($p->tanggal); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Pegawai</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_pegawai" placeholder="0.00" value="<?php echo e($p->belanja_pegawai); ?>" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Barang</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_barang" placeholder="0.00" value="<?php echo e($p->belanja_barang); ?>" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Modal</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_modal" placeholder="0.00" value="<?php echo e($p->belanja_modal); ?>" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="total" placeholder="0.00" value="<?php echo e($p->total); ?>" class="span11" required>
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