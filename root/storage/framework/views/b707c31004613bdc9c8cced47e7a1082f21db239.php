<style>
    table,tr,td,th{
        border:1px solid black
    }
</style>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Pendaftaran</th>
            <th>Nama Lengkap</th>
            <th>No KTP</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Usia</th>
            <th>Kapal (Tujuan)</th>
            <th>Kelas/Golongan</th>
            <th>Tarif</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $__currentLoopData = $penumpang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($no++); ?></td>
            <td><?php echo e($p->uid); ?></td>
            <td><?php echo e($p->nama_lengkap); ?></td>
            <td><?php echo e($p->no_ktp); ?></td>
            <td><?php echo e($p->jenis_kelamin); ?></td>
            <td><?php echo e($p->agama); ?></td>
            <td><?php echo e($p->jenis_usia==1?"Dewasa (Lebih dari 12 tahun)":"Anak-Anak (Kurang dari 12 Tahun)"); ?></td>
            <td><?php echo e($p->nama_kapal); ?></td>
            <td><?php echo e($p->kelas); ?></td>
            <td><?php echo e($p->harga); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>