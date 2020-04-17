<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Galeri Foto</h5>
          </div>
          <div class="widget-content">
          <h5>Tambah Foto</h5>
           <form action="<?php echo e(route('galeri.post')); ?>" method="post" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
               <div class="controls">
                  <input type="hidden" name="id_berita" value="<?php echo e($id); ?>">
                  <input type="hidden" name="title" value="<?php echo e($berita->title); ?>">
                  <input type="file" name="path" required>
                  <?php if($errors->has('path')): ?>
                    <div class="alert alert-error">
                        <?php echo e($errors->first('path')); ?>

                    </div>
                  <?php endif; ?>
               </div>
               <div class="controls" style="margin-top:10px">
                   <button class="btn btn-primary" type="submit">Kirim</button>
               </div>
           </form>
           <hr>
            <?php if($galeri->count()==0): ?>
            <span class="badge badge-warning">Belum ada foto</span>
            <?php endif; ?>
            <ul class="thumbnails">
             <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="span2"> <a> <img src="<?php echo e(asset('img/'.$g->path)); ?>" alt="" > </a>
                <div class="actions"> <a title="" class="" href="<?php echo e(route('galeri.delete',$g->id)); ?>"><i class="icon-trash"></i></a> <a class="lightbox_trigger" href="<?php echo e(asset('img/'.$g->path)); ?>"><i class="icon-picture"></i></a> </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <a href="<?php echo e(route('berita.index')); ?>"><button class="btn" style="margin-top:15px">Kembali</button></a>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>