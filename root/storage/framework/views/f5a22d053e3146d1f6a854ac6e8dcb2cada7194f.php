<style>
    table,tr,td,th{
        border:1px solid black
    }
</style>
<table>
    <thead>
        <tr>
            <th>No. Urut</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat</th>
            <th>Tujuan</th>
            <th>Perihal</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td>
            <td><?php echo e($s->no_urut); ?><?php if(isset($s->sub)): ?><?php echo e('.'.$s->sub); ?><?php endif; ?></td>
            <td><?php echo e($s->kode_surat); ?>/<?php echo e($s->no_urut); ?><?php if(isset($s->sub)): ?><?php echo e('.'.$s->sub); ?><?php endif; ?>/<?php echo e($s->bulan); ?>/BPTD-GTLO/<?php echo e(date("Y",strtotime($s->tgl_surat))); ?></td>
            <td><?php echo e($s->tgl_surat); ?></td>
            <td><?php echo e($s->tujuan); ?></td>
            <td><?php echo e($s->perihal); ?></td>
            <td><?php echo e($s->ket); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>