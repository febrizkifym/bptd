<?php $__env->startSection('content'); ?>
<div class="row-fluid">
        <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-arrow-up"></i> </span>
            <h5>Daftar Ruas</h5>
            </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Daerah</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php $__currentLoopData = $ruas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($r->nama); ?></td>
                        <td><?php echo e($r->daerah); ?></td>
                        <td><?php echo e($r->kecamatan); ?></td>
                        <td></td>
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
                <form action="<?php echo e(route('dalalo.post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <tr>
                            <div class="control-group">
                                <th>Klasifikasi Surat</th>
                                <td>
                                    <div class="controls">
                                    <select name="id_klasifikasi" id="klasifikasi" class="span4">
                                    <?php $__currentLoopData = $klasifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->klasifikasi); ?> - <?php echo e($k->kode); ?>.<?php echo e($k->sub); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <th>Nomor Urut</th>
                            <td>
                                <input type="number" min="0" name="no_urut" id="no_urut" class="form-control" value="<?php echo e($no_urut); ?>" readonly required>
                                <div class="controls">
                                    <label>
                                    <input type="checkbox" name="cek_no" id="cek_no" />
                                    Ubah Nomor Surat</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat</th>
                            <td>
                                <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required>
                                <input type="hidden" name="bulan" id="bulan"> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>
                                <input type="text" name="tujuan" class="form-control" value="<?php echo e(old('tujuan')); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Isi Surat</th>
                            <td>
                                <input type="text" name="perihal" class="form-control" value="<?php echo e(old('perihal')); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input type="text" name="ket" class="form-control" value="<?php echo e(old('ket')); ?>"> 
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