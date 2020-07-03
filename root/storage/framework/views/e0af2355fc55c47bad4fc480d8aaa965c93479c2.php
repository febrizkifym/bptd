<?php $__env->startSection('content'); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><h5>Tambah Data</h5></div>
            <div class="widget-content nopadding">
                <form action="<?php echo e(route('surat.klasifikasi_update',$k->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Klasifikasi</th>
                            <td>
                                <input type="text" name="klasifikasi" class="form-control" value="<?php echo e($k->klasifikasi); ?>" placeholder="Contoh: KEUANGAN" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kode (Pokok Masalah)</th>
                            <td>
                                <input type="text" name="kode" class="form-control" value="<?php echo e($k->kode); ?>" placeholder="Contoh: KU" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Sub (Sekunder dan Tertier)</th>
                            <td>
                                <input type="text" name="sub" class="form-control" value="<?php echo e($k->sub); ?>" placeholder="Contoh: 001" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input type="text" name="keterangan" class="form-control" value="<?php echo e($k->keterangan); ?>" placeholder="Contoh: Perencanaan Anggaran" required> 
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