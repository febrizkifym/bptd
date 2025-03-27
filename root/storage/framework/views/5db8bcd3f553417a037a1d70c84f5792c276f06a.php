<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <h5>Setting Beranda</h5>
                </div>
                <div class="widget-content">
                    <div class="alert alert-info">
                        <button class="close" data-dismiss="alert">×</button>
                        Klik dua kali pada kotak teks untuk mengedit.
                    </div>
                    <form action="<?php echo e(route('beranda.update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Teks Beranda</th>
                                <td>
                                    <textarea name="teks" id="teks" cols="30" rows="2" readonly ondblclick="this.readOnly='';"
                                        onblur="this.readOnly=true"><?php echo e($b->teks); ?></textarea>
                                </td>
                            </tr>

                            <tr>
                                <th>Teks Sejarah</th>
                                <td>
                                    <textarea name="sejarah" id="sejarah" cols="30" rows="2"><?php echo e($b->sejarah); ?></textarea>
                                </td>
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
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <h5>TV Informasi</h5>
                </div>
                <div class="widget-content">
                    <form action="<?php echo e(route('tvinformasi.update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Running Text</th>
                                <td>
                                    <textarea name="tv_runningtext" id="tv_runningtext" cols="30" rows="2" readonly
                                        ondblclick="this.readOnly='';" onblur="this.readOnly=true"><?php echo e($b->tv_runningtext); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Video</th>
                                <td>
                                    <?php if($b->video): ?>
                                        ada
                                    <?php else: ?>
                                        <span class="label label-warning">Belum Diinput</span>
                                        <div>(Video harus format MP4)</div>
                                    <?php endif; ?>
                                    <hr>
                                    <input type="file" name="tv_video">
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
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        CKEDITOR.replace('sejarah');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>