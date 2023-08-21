<?php $__env->startSection('content'); ?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">PPID BPTD Kelas II Gorontalo</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<div style="margin-top:50px"></div>
<?php if($ppid): ?>
<?php if($berkala->first()): ?>
<section id="berkala">
    <div class="container">
        <h2>Informasi Berkala</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            <?php $__currentLoopData = $berkala; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($p->tanggal); ?></td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td><?php echo e($p->judul); ?></td>
                <td><?php echo e($p->deskripsi); ?></td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/<?php echo e($p->file); ?>"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <hr>
    </div>
</section>
<?php endif; ?>
<?php if($sertamerta->first()): ?>
<section id="sertamerta">
    <div class="container">
        <h2>Informasi Serta Merta</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            <?php $__currentLoopData = $sertamerta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($p->tanggal); ?></td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td><?php echo e($p->judul); ?></td>
                <td><?php echo e($p->deskripsi); ?></td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/<?php echo e($p->file); ?>"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <hr>
    </div>
</section>
<?php endif; ?>
<?php if($setiapsaat->first()): ?>
<section id="setiapsaat">
    <div class="container">
        <h2>Informasi Berkala</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            <?php $__currentLoopData = $setiapsaat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($p->tanggal); ?></td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td><?php echo e($p->judul); ?></td>
                <td><?php echo e($p->deskripsi); ?></td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/<?php echo e($p->file); ?>"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <hr>
    </div>
</section>
<?php endif; ?>
<?php if($dikecualikan->first()): ?>
<section id="dikecualikan">
    <div class="container">
        <h2>Informasi Dikecualikan</h2>
        <table class="table table-striped table-bordered">
            <tr>
                <?php $no=1; ?>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis PPID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>File</th>
            </tr>
            <?php $__currentLoopData = $dikecualikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($p->tanggal); ?></td>
                <td>
                    <?php
                    switch ($p->jenis) {
                        case 'berkala':
                            echo "Informasi Berkala";
                            break;
                        case 'sertamerta':
                            echo "Informasi Serta Merta";
                            break;
                        case 'setiapsaat':
                            echo "Informasi Setiap Saat";
                            break;
                        case 'dikecualikan':
                            echo "Informasi Dikecualikan";
                            break;
                    }
                    ?>
                </td>
                <td><?php echo e($p->judul); ?></td>
                <td><?php echo e($p->deskripsi); ?></td>
                <td style="text-align: center">
                    <a href="/berkas_ppid/<?php echo e($p->file); ?>"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/PDF_icon.svg" alt="" style="height:40px;width:40px"></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <hr>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>