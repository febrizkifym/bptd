<?php
    use Illuminate\Support\Str; 
?>
<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-paper-clip"></i> </span>
              <h5>Postingan Berita</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal Posting</th>
                            <th>Gambar</th>
                            <th>Jumlah Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $foto = App\Galeri::where('id_berita',$b->id)->count();
                        ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($b['title']); ?></td>
                            <td>
                                <?php if($b['public']): ?>
                                    <?php echo e($b['post_date']); ?>

                                <?php else: ?>
                                    <center>
                                      <span class="badge badge-warning">Belum diposting</span>
                                    </center>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($b['thumbnail']): ?>
                                 <center>
                                  <span class="badge badge-success"><i class="icon-ok"></i></span>
                                 </center>
                                <?php else: ?>
                                    <center>
                                      <span class="badge badge-important"><i class="icon-remove"></i></span>
                                    </center>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($foto); ?>

                            </td>
                            <td>
                                <center>
                                    <a href="<?php echo e(route('single',[$b->id,$b->slug])); ?>"><button class="btn btn-mini btn-primary">Lihat Postingan</button></a>
                                    <a href="<?php echo e(route('galeri.detail',$b->id)); ?>"><button class="btn btn-mini btn-info">Lihat Album</button></a>
                                    <a href="<?php echo e(route('berita.edit',$b['id'])); ?>"><button class="btn btn-mini btn-warning">Edit</button></a>
                                    <a href="<?php echo e(route('berita.delete',$b['id'])); ?>"><button class="btn btn-mini btn-danger">Hapus</button></a>
                                </center>
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
            <a href="<?php echo e(route('berita.add')); ?>"><button class="btn btn-success">Buat Postingan Baru</button></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>