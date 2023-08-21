<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-film"></i> </span>
              <h5>Daftar Video</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>ID Video Youtube</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($v->title); ?></td>
                            <td><?php echo e($v->video_path); ?></td>
                            <td>
                                <a href="<?php echo e(route('video.edit',$v->id)); ?>"><button class="btn btn-primary">Edit</button></a>
                                <a href="<?php echo e(route('video.delete',$v->id)); ?>"><button class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
              </div>
            </div>
    </div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
               <form action="<?php echo e(route('video.post')); ?>" method="post">
                   <?php echo csrf_field(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama / Judul</th>
                        <td>
                            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>ID Video Youtube</th>
                        <td>
                            <input type="text" name="video_path" class="form-control" value="<?php echo e(old('video_path')); ?>" placeholder="Contoh : ovFPKu00cCc" required> 
                        </td>
                        <div class="alert alert-info">
                        <button class="close" data-dismiss="alert">×</button>
                        Contoh ID Video Youtube https://www.youtube.com/watch?v=<b>ovFPKu00cCc</b></div>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>