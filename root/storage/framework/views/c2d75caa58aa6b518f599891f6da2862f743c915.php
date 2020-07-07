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
                            <td>
                                <a href="<?php echo e(route('dalalo.titik_delete',$t->id)); ?>" class="btn_hapus"><button class="btn btn-danger">Hapus</button></a>
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
                <form action="<?php echo e(route('dalalo.titik_post')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id_ruas" value="<?php echo e($ruas->id); ?>">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tabel.Kode Rambu</th>
                            <td>
                                <input type="text" name="tabel_kd" class="form-control" placeholder="(Tabel).(Kode Rambu)" value="<?php echo e(old('tabel_kd')); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>
                                <input type="text" name="tahun" class="form-control" placeholder="Tahun Pemasangan" value="<?php echo e(old('tahun')); ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Latitude (Garis Lintang)</th>
                            <td>
                                <input type="text" name="x" class="form-control" placeholder="Titik Koordinat Lintang" value="<?php echo e(old('x')); ?>" required> 
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Longitude (Garis Bujur)</th>
                            <td>
                                <input type="text" name="y" class="form-control" placeholder="Titik Koordinat Bujur" value="<?php echo e(old('y')); ?>" required> 
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
<?php $__env->startSection('script'); ?>
<script>
 $('.select2').select2();
 $(".btn_hapus").click(function(e){
        e.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Hapus Data?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>