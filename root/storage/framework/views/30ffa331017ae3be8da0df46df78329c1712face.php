<?php $__env->startSection('content'); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
<!--
            <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                
            </div>
-->
               <form action="<?php echo e(route('satpel.post')); ?>" method="post" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama')); ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <textarea name="alamat" id="" cols="30" rows="2"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Tupoksi</th>
                        <td>
                            <textarea name="tupoksi" id="" cols="50" rows="2"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Struktur</th>
                        <td>
                            <input type="file" name="struktur">
                            <?php if($errors->has('struktur')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('struktur')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            <input type="file" name="gambar">
                            <?php if($errors->has('gambar')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('gambar')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?php echo e(route('satpel.index')); ?>"><button class="btn" type="button">Kembali</button></a></td>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>