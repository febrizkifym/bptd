<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>PROBADUT - BPTD XXI GORONTALO</title>
    <link rel="shortcut icon" href="<?php echo e(asset('pbd/img/favicon.png')); ?>" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('pbd/css/style.css')); ?>">
    <style>
    .tiket tr{
            height:40px;
        }
    </style>
</head>
<body>
    <header>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-none" id="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">PROBADUT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#infokapal">Informasi Kapal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#registrasi">Pendaftaran Calon Penumpang</a>
            </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        <h1 class="title">Proses Birokrasi & Administrasi yang Transparan Menuju Pelayanan yang Terintegrasi</h1>
    </div>
</header>
<section id="tentang">
    <div class="container">
        <h1>Tentang PROBADUT</h1>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi architecto aliquam accusamus illo ea asperiores, nemo esse dolore totam doloremque dicta numquam fugit exercitationem aspernatur ullam consequatur perspiciatis quibusdam in.Alias inventore voluptates temporibus et hic, ab quae. Ipsam, molestias voluptatum? Voluptates ipsam veniam ea eius eligendi libero perferendis assumenda rerum. Quaerat ab soluta atque fuga sequi recusandae expedita officiis?
    </div>
</section>
<section id="infokapal">
    <div class="container">
        <h1 class="text-center">Informasi Kapal</h1>
        <img src="<?php echo e(asset('pbd/img/kmpmoinit.png')); ?>" alt="KMP Moinit" class="img-fluid mx-auto d-block">
        <hr>
    </div>
</section>
<section id="registrasi">
    <div class="container">
        <h1 class="text-center">Daftar Calon Penumpang</h1>
        <div class="col-lg-6">
            <form action="<?php echo e(route('probadut.post')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="uid" id="uid" value="" required>
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
                        <select name="kelas" id="golongan" class="form-control parameter" disabled>
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
</section>
<section id="cek_tiket">
    <div class="container">
        <h1 class="text-center">Cek Status Registrasi</h1>
        <hr>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="no_regis" placeholder="Masukkan Kode Registrasi. Contoh : 531413" aria-describedby="cek_btn">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="cek_btn">Cari</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div id="tiket_result">
                    <table class="tiket">
                        <tr><th>Nama Lengkap</th><td>:</td><td class="t_nama"></td></tr>
                        <tr><th>Nomor KTP</th><td>:</td><td class="t_noktp"></td></tr>
                        <tr><th>Jenis Kelamin</th><td>:</td><td class="t_jk"></td></tr>
                        <tr><th>Agama</th><td>:</td><td class="t_agama" style="text-transform:capitalize"></td></tr>
                        <tr><th>Usia</th><td>:</td><td class="t_usia"></td></tr>
                        <tr><th>Kapal</th><td>:</td><td class="t_kapal"></td></tr>
                        <tr><th>Kelas/Golongan</th><td>:</td><td class="t_kelas" style="text-transform:uppercase"></td></tr>
                        <tr><th>Tarif</th><td>:</td><td class="t_tarif"></td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" id="tiket_notfound" role="alert">
        Data Calon Penumpang tidak ditemukan.
        </div>
    </div>
</section>
<footer class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p style="font-size:9pt">Copyright All Rights Reserved 2020. Humas Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="<?php echo e(asset('pbd/js/main.js')); ?>"></script>
</body>
</html>