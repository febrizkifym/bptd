<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Data Calon Penumpang</h5>
              </div>
              <div class="widget-content nopadding">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Pendaftaran</th>
                            <td><?php echo e($p->uid); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?php echo e($p->nama); ?></td>
                        </tr>
                        <tr>
                            <th>No KTP</th>
                            <td><?php echo e($p->no_ktp); ?></td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td><?php echo e($p->no_hp); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?php echo e($p->jenis_kelamin); ?></td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td style="text-transform:capitalize"><?php echo e($p->agama); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Usia</th>
                            <td>
                                <?php if($p->jenis_usia=1): ?>
                                    Dewasa (Lebih dari 12 tahun)
                                <?php else: ?>
                                    Anak-Anak (Kurang dari 12 tahun)
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Kapal (Tujuan)</th>
                            <td><?php echo e($p->kapal); ?> (<?php echo e($p->tujuan); ?>)</td>
                        </tr>
                        <tr>
                            <th>Uraian</th>
                            <td style="text-transform:capitalize"><?php echo e($p->kelas); ?></td>
                        </tr>
                        <tr>
                            <th>Tarif</th>
                            <td>Rp.<?php echo e($p->harga); ?></td>
                        </tr>
                        <tr>
                            <th>Seat</th>
                            <form action="<?php echo e(route('penumpang.update_seat',$p->uid)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <td><input type="text" class="form-control" name="seat" value="<?php echo e($p->seat); ?>" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">
                                <br><input type="submit" value="Simpan" class="btn btn-info btn-mini">
                            </td>
                            </form>
                        </tr>
                        <tr>
                            <th>Aksi</th>
                            <td>
                                <?php if($p->status == "pending"): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <h4>PENDING</h4>
                                    </div>
                                <?php elseif($p->status == "konfirmasi"): ?>
                                    <div class="alert alert-success" role="alert">
                                        <h4>KONFIRMASI</h4>
                                    </div>
                                <?php elseif($p->status == "batal"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <h4>BATAL</h4>
                                    </div>
                                <?php endif; ?>
                                <a href="<?php echo e(route('penumpang.aksi',$p->uid)); ?>?o=konfirmasi" class="btn btn-success" id="btn_konfirmasi">Konfirmasi</a>
                                <a href="<?php echo e(route('penumpang.aksi',$p->uid)); ?>?o=batal" class="btn btn-danger" id="btn_batal">Batalkan</a>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <a href="<?php echo e(route('penumpang.index')); ?>"><button class="btn">Kembali</button></a>
                            </td>
                        </tr>
                    </table>
              </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $("#btn_konfirmasi").click(function(e){
        e.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Konfirmasi Tiket?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    });
    $("#btn_batal").click(function(e){
        e.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Batalkan Tiket?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>