<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-envelope"></i> </span>
              <h5>Arsip Surat</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="table-responsive" style="overflow-x:auto">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Tujuan</th>
                                <th>Perihal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($s->no_urut); ?><?php if(isset($s->sub)): ?><?php echo e('.'.$s->sub); ?><?php endif; ?></td>
                                <td><?php echo e($s->kode); ?>.<?php echo e($s->klasifikasi_sub); ?>/<?php echo e($s->no_urut); ?><?php if(isset($s->sub)): ?><?php echo e('.'.$s->sub); ?><?php endif; ?>/<?php echo e($s->bulan); ?>/BPTD-GTLO/<?php echo e(date("Y",strtotime($s->tgl_surat))); ?></td>
                                <td><?php echo e($s->tgl_surat); ?></td>
                                <td><?php echo e($s->tujuan); ?></td>
                                <td><?php echo e($s->perihal); ?></td>
                                <td><?php echo e($s->ket); ?></td>
                                <td>
                                <?php if(Auth::user()->role == 'admin'): ?>
                                    <a href="<?php echo e(route('surat.edit',$s->id)); ?>"><button class="btn btn-warning btn-mini">Edit</button></a>
                                    <a href="<?php echo e(route('surat.delete',$s->id)); ?>"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
                <div class="widget-title"><h5>Tambah Data</h5></div>
                <div class="widget-content">
                    <form action="<?php echo e(route('surat.post')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <div class="control-group">
                                    <th>Klasifikasi Surat</th>
                                    <td>
                                        <div class="controls">
                                        <select name="id_klasifikasi" id="klasifikasi" class="span4">
                                        <?php $__currentLoopData = $klasifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->id); ?>"><?php echo e($k->klasifikasi); ?> - <?php echo e($k->kode); ?>.<?php echo e($k->sub); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <th>Nomor Urut</th>
                                <td>
                                    <input type="number" min="0" name="no_urut" id="no_urut" class="form-control" value="<?php echo e($no_urut); ?>" readonly required>
                                    <div class="controls">
                                        <label>
                                        <input type="checkbox" name="cek_no" id="cek_no" />
                                        Ubah Nomor Surat</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <td>
                                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required>
                                    <input type="hidden" name="bulan" id="bulan"> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>
                                    <input type="text" name="tujuan" class="form-control" value="<?php echo e(old('tujuan')); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Isi Surat</th>
                                <td>
                                    <input type="text" name="perihal" class="form-control" value="<?php echo e(old('perihal')); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="ket" class="form-control" value="<?php echo e(old('ket')); ?>"> 
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
    <div class="row-fluid">
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-table"></i> </span>
              <h5>Export Data</h5>
              </div>
              <div class="widget-content nopadding">
                <form action="<?php echo e(route('surat.export')); ?>" method="get" class="form-horizontal">
                    <div class="control-group">
                        <label for="klasifikasi" class="control-label">Klasifikasi Surat : </label>
                        <div class="controls">
                            <select name="id_klasifikasi" id="klasifikasi" class="span11">
                                <?php $__currentLoopData = $klasifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k->id); ?>"><?php echo e($k->klasifikasi); ?> - <?php echo e($k->kode); ?>.<?php echo e($k->sub); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="bulan" class="control-label">Bulan : </label>
                        <div class="controls">
                            <select name="bulan" class="span11">
                                <option value="I">Januari</option>
                                <option value="II">Februari</option>
                                <option value="III">Maret</option>
                                <option value="IV">April</option>
                                <option value="V">Mei</option>
                                <option value="VI">Juni</option>
                                <option value="VII">Juli</option>
                                <option value="VIII">Agustus</option>
                                <option value="IX">September</option>
                                <option value="X">Oktober</option>
                                <option value="XI">November</option>
                                <option value="XII">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="tahun" class="control-label">Tahun : </label>
                        <div class="controls">
                            <input type="number" name="tahun" value="2020" id="tahun" class="span4" placeholder="2020" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Export Excel</button>
                            <!-- <a href="<?php echo e(route('surat.export')); ?>"><button class="btn btn-success">Export Excel</button></a> -->
                        </div>
                    </div>
                </form>
              </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    function romanize(num) {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
                "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
                "","I","II","III","IV","V","VI","VII","VIII","IX"],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }
    $("#tgl_surat").change(function(){
        var tgl = new Date($("#tgl_surat").val());
        var bulan = romanize(tgl.getMonth()+1);
        $("#bulan").val(bulan);
    });
    $("#cek_no").click(function(){
        if($("#cek_no").is(":checked")){
            $("#no_urut").prop('readonly', false);
        }else{
            $("#no_urut").prop('readonly', true);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>