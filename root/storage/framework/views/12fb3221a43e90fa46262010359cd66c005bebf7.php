

<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              <h5>User</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($u['firstname'].' '.$u['lastname']); ?></td>
                            <td><?php echo e($u['email']); ?></td>
                            <td><?php echo e($u['username']); ?></td>
                            <td><?php echo e($u['role']); ?></td>
                            <td>
                                <a href="<?php echo e(route('user.edit',$u['id'])); ?>"><button class="btn btn-info">Edit</button></a>
                                <a href="<?php echo e(route('user.delete',$u['id'])); ?>"><button class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
              </div>
            </div>
    <div class="row-fluid">
        <div class="span12">
            <a href="<?php echo e(route('user.add')); ?>"><button class="btn btn-success">Tambah</button></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>