<?php $__env->startSection('content'); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Detail</h5>
            </div>
            <div class="widget-content">
               <div class="alert alert-info">
              <button class="close" data-dismiss="alert">×</button>
              Klik dua kali pada kotak teks untuk mengedit.</div>
               <form action="<?php echo e(route('satpel.update',$sp->id)); ?>" method="post" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="nama" class="form-control" value="<?php echo e($sp->nama); ?>" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true"> 
                            <?php if($errors->has('nama')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('nama')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <textarea name="alamat" id="" cols="30" rows="2" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true"><?php echo e($sp->alamat); ?></textarea>
                            <?php if($errors->has('alamat')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('alamat')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tupoksi</th>
                        <td>
                            <textarea class="span12" id="tupoksi" name="tupoksi" rows="6" placeholder=""><?php echo e($sp->tupoksi); ?></textarea>
                            <?php if($errors->has('tupoksi')): ?>
                            <div class="alert alert-error">
                                <?php echo e($errors->first('tupoksi')); ?>

                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Struktur</th>
                        <td>
                            <?php if($sp->struktur): ?>
                                <a href="<?php echo e(asset('img/'.$sp->struktur)); ?>"><img src="<?php echo e(asset('img/'.$sp->struktur)); ?>" alt="" class="img-thumbnail"></a>
                            <?php else: ?>
                            <span class="label label-warning">Belum Diinput</span>
                            <div>(Ukuran foto yang disarakan = 1280x768)</div>
                            <?php endif; ?>
                            <hr>
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
                            <?php if($sp->gambar): ?>
                                <a href="<?php echo e(asset('img/'.$sp->gambar)); ?>"><img src="<?php echo e(asset('img/'.$sp->gambar)); ?>" alt="" class="img-thumbnail"></a>
                            <?php else: ?>
                            <span class="label label-warning">Belum Diinput</span>
                            <div>(Ukuran foto yang disarakan = 1280x768)</div>
                            <?php endif; ?>
                            <hr>
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