<?php $__env->startSection('content'); ?>
<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
          <h5>Konten</h5>
          </div>
          <div class="widget-content">
            <div class="control-group">
                <form method="post" action="<?php echo e(route('berita.post')); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                   <div class="controls">
                       <label for="title">Judul Berita/Kegiatan</label>
                       <input type="text" name="title" class="span12" required>
                       
                            <?php if($errors->has('title')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('title')); ?>

                            </div>
                            <?php endif; ?>
                   </div>
                   <div class="controls">
                       <label for="thumbnail">Gambar</label>
                       <input type="file" name="thumbnail" required>
                            <?php if($errors->has('thumbnail')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('thumbnail')); ?>

                            </div>
                            <?php endif; ?>
                   </div>
                   <hr>
                    <div class="controls">
                        <textarea class="span12" id="post" name="content" rows="6" placeholder=""></textarea>
                        <hr>
                            <?php if($errors->has('content')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('content')); ?>

                            </div>
                            <?php endif; ?>
                    </div>
                    <div class="controls">
                        <button class="btn btn-primary" type="submit">Simpan & Kirim</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>