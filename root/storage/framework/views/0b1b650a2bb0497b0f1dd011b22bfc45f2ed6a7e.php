<?php $__env->startSection('content'); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
               <form action="<?php echo e(route('user.post')); ?>" method="post">
                   <?php echo csrf_field(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Depan</th>
                        <td>
                            <input type="text" name="firstname" class="form-control" value="<?php echo e(old('firstname')); ?>" required>
                            <?php if($errors->has('firstname')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('firstname')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Belakang</th>
                        <td>
                            <input type="text" name="lastname" class="form-control" value="<?php echo e(old('lastname')); ?>" required>
                            <?php if($errors->has('lastname')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('lastname')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>
                            <input type="text" name="username" class="form-control" value="<?php echo e(old('username')); ?>" required>
                            <?php if($errors->has('username')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('username')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('email')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Pasword</th>
                        <td>
                            <input type="password" name="password" class="form-control" value="<?php echo e(old('password')); ?>" required>
                            <?php if($errors->has('password')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('password')); ?>

                            </div>
                            <?php endif; ?>
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