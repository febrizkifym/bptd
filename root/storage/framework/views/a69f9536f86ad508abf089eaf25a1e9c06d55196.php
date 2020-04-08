

<?php $__env->startSection('content'); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
               <form action="<?php echo e(route('sdm.post')); ?>" method="post">
                   <?php echo csrf_field(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Satpel</th>
                        <td>
                            <select name="satpel" id="satpel" class="form-control">
                                <?php
                                    if(isset($_GET['satpel'])){
                                        $satpel_id = $_GET['satpel'];
                                    }
                                ?>
                                <?php $__currentLoopData = $satpel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sp->id); ?>" <?php if(isset($_GET['satpel'])): ?><?php echo e($satpel_id == $sp['id']?'selected':''); ?><?php endif; ?>><?php echo e($sp->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama')); ?>" placeholder="Beserta Titel" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>Pangkat (Golongan)</th>
                        <td>
                            <input type="text" name="pangkat" class="form-control" value="<?php echo e(old('pangkat')); ?>" placeholder="Contoh : Penata Tkt. I (III/d)" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo e(old('jabatan')); ?>" placeholder="Ditulis Dengan Lengkap" required> 
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?php echo e(route('sdm.index')); ?>"><button class="btn" type="button">Kembali</button></a></td>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>