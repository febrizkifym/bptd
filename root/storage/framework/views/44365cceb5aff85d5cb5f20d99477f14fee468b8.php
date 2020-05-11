<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-6">
        <h2>Form Pendaftaran Calon Penumpang</h2>
        <form action="<?php echo e(route('probadut.post')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="nama">Nama Calon Penumpang</label>
                <input type="text" name="nama" id="nama" value="<?php echo e(old('nama')); ?>" placeholder="Nama Lengkap" class="form-control" required>
                <?php if($errors->has('nama')): ?>
                <div class="invalid-feedback" role="alert">
                    <?php echo e($errors->first('nama')); ?>

                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="noktp">No. KTP</label>
                <input type="text" name="noktp" id="noktp" value="<?php echo e(old('noktp')); ?>" placeholder="Contoh : 750113xxxxxxxxxx" class="form-control <?php echo e($errors->has('noktp')?'is-invalid':''); ?>">
                <?php if($errors->has('noktp')): ?>
                <div class="invalid-feedback" role="alert">
                    <?php echo e($errors->first('noktp')); ?>

                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" id="agama" class="form-control">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usia">Usia</label>
                <!-- <input type="number" name="usia" id="usia" min="0" value="0" class="form-control"> -->
                <select name="usia" id="usia" class="parameter form-control">
                    <option value="1">Dewasa (Lebih dari 12 Tahun)</option>
                    <option value="2">Anak-Anak (0 Sampai 12 Tahun)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" class="parameter form-control">
                    <option value="vip">VIP</option>
                    <option value="bisnis">Bisnis</option>
                    <option value="ekonomi">Ekonomi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <select name="tujuan" id="tujuan" class="parameter form-control">
                    <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->tujuan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kenderaan">Membawa Kenderaan</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kenderaan" id="kenderaan_y" value="ya">
                    <label class="form-check-label" for="kenderaan_y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kenderaan" id="kenderaan_n" value="tidak" checked>
                    <label class="form-check-label" for="kenderaan_n">Tidak</label>
                </div>
            </div>
            <div class="form-group" id="form-golongan" style="display:none">
                <label for="golongan">Golongan</label>
                <select name="golongan" id="golongan" class="form-control parameter" disabled>
                    <option value="1">Golongan I – Sepeda</option>
                    <option value="2">Golongan II – Sepeda Motor (<500CC)</option>
                    <option value="3">Golongan III – Sepeda Motor (>=500CC)</option>
                    <option value="4a">Golongan IVa – Mobil/Sedan (<=5m)</option>
                    <option value="4b">Golongan IVb – Mobil Barang (<=5m)</option>
                    <option value="5a">Golongan Va – Bis Sedang (<=7m)</option>
                    <option value="5b">Golongan Vb – Truk Sedang (<=7m)</option>
                    <option value="6a">Golongan VIa – Bis Besar (<=10m)</option>
                    <option value="6b">Golongan VIb – Truk Besar (<=10m)</option>
                    <option value="7">Golongan VII – Truk Trailer (<=12m)</option>
                    <option value="8">Golongan VIII – Truk Trailer (<=16m)</option>
                    <option value="9">Golongan IX – Truk Trailer (>16m)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" class="form-control" aria-label="Total Harga" id="total_harga" value="0" aria-describedby="total_harga" readonly>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/pbd_registrasi.js')); ?>"></script>
<script>
<?php if($message = Session::get('berhasil')): ?>
    swal('berhasil');
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/probadut', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>