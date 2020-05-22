<?php $__env->startSection('style'); ?>
<style>
.loginbox{
        background-color:#FFF;
        border-radius:5px;
        padding:30px 20px 10px 20px;
        /* border:1px solid rgba(0,0,0,0.5); */
        box-shadow: 2px 2px 8px 0px rgba(0,0,0,0.22),-5px -5px 8px 0px rgb(255,255,255);
        margin-top:20px;
}
.title{
    font-weight: bold;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="loginbox">
            <span class="title">Login User</span>
            <hr>
            <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>


                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>