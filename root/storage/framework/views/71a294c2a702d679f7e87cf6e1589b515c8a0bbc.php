<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Data Informasi Publik</h5>
                </div>
                <div class="widget-content nopadding">
                    <div class="table-responsive" style="overflow-x:auto">
                        <table class="table table-bordered table-hover data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Informasi</th>
                                    <th>Jenis PPID</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $__currentLoopData = $ppid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($no); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($p->tanggal)->formatLocalized('%d %B %Y')); ?></td>
                                        <td>
                                            <?php
                                            switch ($p->jenis) {
                                                case 'berkala':
                                                    echo 'Informasi Berkala';
                                                    break;
                                                case 'sertamerta':
                                                    echo 'Informasi Serta Merta';
                                                    break;
                                                case 'setiapsaat':
                                                    echo 'Informasi Setiap Saat';
                                                    break;
                                                case 'dikecualikan':
                                                    echo 'Informasi Dikecualikan';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo e($p->judul); ?></td>
                                        <td><?php echo e($p->deskripsi); ?></td>
                                        <td style="text-align: center">
                                            <a href="/berkas_ppid/<?php echo e($p->file); ?>">
                                                <h3><i class="icon icon-download-alt"></i></h3>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if(Auth::user()->role == 'admin'): ?>
                                                <a href="<?php echo e(route('ppid.edit', $p->id)); ?>"><button
                                                        class="btn btn-warning btn-mini">Edit</button></a>
                                                <a href="<?php echo e(route('ppid.delete', $p->id)); ?>"><button
                                                        class="btn btn-danger btn-mini">Hapus</button></a>
                                            <?php endif; ?>
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
                            <form action="<?php echo e(route('ppid.post')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <table class="table table-bordered">
                                    <tr>
                                    <tr>
                                        <th>Tanggal Informasi</th>
                                        <td>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis PPID</th>
                                        <td>
                                            <div class="controls">
                                                <select name="jenis" class="span4 select2">
                                                    <option value="berkala">Informasi Berkala</option>
                                                    <option value="sertamerta">Informasi Serta Merta</option>
                                                    <option value="setiapsaat">Informasi Setiap Saat</option>
                                                    <option value="dikecualikan">Informasi Dikecualikan</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Judul</th>
                                        <td>
                                            <input type="text" name="judul" class="form-control"
                                                value="<?php echo e(old('ket')); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>
                                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?php echo e(old('deksripsi')); ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>File</th>
                                        <td>
                                            <input type="file" name="file" id="file" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                            <button class="btn btn-secondary" type="reset">Reset</button>
                                        </td>
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
                $('.select2').select2();
                CKEDITOR.replace( 'deskripsi' );
            </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>