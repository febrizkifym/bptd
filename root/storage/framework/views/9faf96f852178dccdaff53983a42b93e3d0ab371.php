<?php $__env->startSection('content'); ?>
<h3 class="text-center">PELABUHAN PENYEBERANGAN GORONTALO</h3>
<div class="line"></div>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi quisquam voluptate temporibus vel enim esse soluta veritatis ea a et consequuntur repellendus, aliquam non! At qui tempora quia obcaecati eius.</p>
<p>Quo tenetur quia commodi non, officia rerum atque harum mollitia ducimus. Vel consectetur optio quos officiis, exercitationem maxime eligendi dolorem aspernatur commodi, corporis itaque voluptatum, sit facere laudantium adipisci modi.</p>
<div class="line"></div>
<h4>Informasi Kapal</h4>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est dicta, ullam, unde nesciunt at quas quasi quam saepe natus assumenda et eos nulla consectetur nobis expedita deserunt dolorum nemo ratione?</p>
<div class="row">
    <div class="col-md-12">
    <?php
        $no = 1;
    ?>
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="nav-item nav-link <?php echo e($tab->id==1?'active':''); ?>" id="nav-<?php echo e($tab->kd_kapal); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($tab->kd_kapal); ?>" role="tab" aria-controls="nav-<?php echo e($tab->kd_kapal); ?>" aria-selected="<?php echo e($tab->id==1?'true':'false'); ?>"><?php echo e($tab->nama." (".$tab->tujuan.")"); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane fade <?php echo e($table->id==1?'show active':''); ?>" id="nav-<?php echo e($table->kd_kapal); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($table->kd_kapal); ?>-tab">
            <div class="table-responsive">   
                <table class="table table-hover" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas/Golongan</th>
                                <th>Usia</th>
                                <th>Tarif</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $tarif = App\TarifKapal::join("pbd_kapal","pbd_kapal.id","pbd_tarif.id_kapal")->where("id_kapal","=",$table->id)->get();
                            $break = true;                    
                        ?>
                            <?php $__empty_1 = true; $__currentLoopData = $tarif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($t->jenis_usia == null && $break == true): ?>
                            <tr>
                                <td colspan=4><b>Kendaraan</b></td>
                            </tr>
                            <?php $break=false;$no=1; ?>
                            <?php endif; ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td style="text-transform:uppercase">
                                    <?php if($t->jenis_usia): ?>
                                    <?php echo e($t->kelas); ?>

                                    <?php else: ?>
                                    GOLONGAN <?php echo e($t->kelas); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($t->jenis_usia==1): ?>
                                        Dewasa (Lebih dari 12 tahun)
                                    <?php elseif($t->jenis_usia==2): ?>
                                        Anak-Anak (Dibawah 12 Tahun)
                                    <?php endif; ?>
                                </td>
                                <td>Rp. <?php echo e(number_format($t->harga)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan=4>Tidak ada data</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php $no=1 ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<div class="line"></div>
<h4>Contact Person</h4>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('apkprofil.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>