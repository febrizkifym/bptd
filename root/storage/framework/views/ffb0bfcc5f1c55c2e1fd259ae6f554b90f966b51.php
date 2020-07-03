<?php $__env->startSection('content'); ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><h5>Edit Data</h5></div>
                <div class="widget-content">
                    <form action="<?php echo e(route('surat.update',$s->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <div class="control-group">
                                    <th>Klasifikasi Surat</th>
                                    <td>
                                        <div class="controls">
                                        <select name="id_klasifikasi" id="klasifikasi" class="span4">
                                        <?php $__currentLoopData = $klasifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->id); ?>" <?php echo e($s->id_klasifikasi==$k->id?"selected":""); ?>><?php echo e($k->klasifikasi); ?> - <?php echo e($k->kode); ?>.<?php echo e($k->sub); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <th>Nomor Urut</th>
                                <td>
                                    <input type="number" min="0" name="no_urut" id="no_urut" class="form-control" value="<?php echo e($s->no_urut); ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <td>
                                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" value="<?php echo e($s->tgl_surat); ?>" required>
                                    <input type="hidden" name="bulan" id="bulan"> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>
                                    <input type="text" name="tujuan" class="form-control" value="<?php echo e($s->tujuan); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Isi Surat</th>
                                <td>
                                    <input type="text" name="perihal" class="form-control" value="<?php echo e($s->perihal); ?>" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="ket" class="form-control" value="<?php echo e($s->ket); ?>"> 
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
        var no_urut = <?php echo e($s->no_urut); ?>;
        if($("#cek_no").is(":checked")){
            $("#no_urut").val(no_urut-1);
        }else{
            $("#no_urut").val(no_urut);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>