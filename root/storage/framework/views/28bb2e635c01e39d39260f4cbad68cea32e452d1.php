<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>BULOTU - BPTD XXI GORONTALO</title>
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
        <a class="navbar-brand" href="#">BULOTU</a>
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
        <!-- <h1 class="title">Proses Birokrasi & Administrasi yang Transparan Menuju Pelayanan yang Terintegrasi</h1> -->
        <h1 class="title">Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo Beritegritas, Berkomitmen Wilayah Bebas Korupsi,Kolusi dan Nepotisme.</h1>
    </div>
</header>
<section id="tentang">
    <div class="container">
        <h1>Tentang Aplikasi BULOTU (Perahu)</h1>
        <p>Aplikasi Bulotu adalah layanan yang dapat diakses melalui website BPTD WIL. XXI PROVINSI GORONTALO diperuntukkan kepada calon pengguna jasa dan kendaraan yang akan menyeberang, tentang informasi kapal sampai dengan status registrasi pengguna jasa yang akan melakukan perjalanan.</p>
        <p>Aplikasi Bulotu mencakup proses birokrasi dan administrasi yang transparan bebas dari pungli, tidak menerima imbalan atau pemberian dalam bentuk apapun.</p>
        <p>Disamping itu, Aplikasi Bulotu sudah terintegrasi dengan beberapa Stakeholder Balai Pengelola Transportasi Darat Wil. XXI Provinsi Gorontalo.</p>
        <p>Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo Beritegritas, Berkomitmen Wilayah Bebas Korupsi,Kolusi dan Nepotisme.</p>
    </div>
</section>
<section id="infokapal">
    <div class="container">
        <h1 class="text-center">Informasi Kapal</h1>
        <img src="<?php echo e(asset('pbd/img/kmpmoinit.png')); ?>" alt="KMP Moinit" class="img-fluid mx-auto d-block">
        <hr>
        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                        $kapal = App\Kapal::all();
                        $no = 1;
                    ?>
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="nav-item nav-link <?php echo e($tab->id==1?'active':''); ?>" id="nav-<?php echo e($tab->kd_kapal); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($tab->kd_kapal); ?>" role="tab" aria-controls="nav-<?php echo e($tab->kd_kapal); ?>" aria-selected="<?php echo e($tab->id==1?'true':'false'); ?>"><?php echo e($tab->nama." (".$tab->tujuan.")"); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade <?php echo e($table->id==1?'show active':''); ?>" id="nav-<?php echo e($table->kd_kapal); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($table->kd_kapal); ?>-tab">
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
                            <?php $no=1 ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Employer</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Contest Name</th>
                                            <th>Date</th>
                                            <th>Award Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<section id="registrasi">
    <div class="container">
        <h1 class="text-center">Daftar Calon Penumpang</h1>
        <div class="row">
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
                        <input type="text" name="noktp" id="noktp" value="<?php echo e(old('noktp')); ?>" placeholder="Contoh : 750113xxxxxxxxxx" class="form-control <?php echo e($errors->has('noktp')?'is-invalid':''); ?>" required <?php echo e($errors->has('noktp')?'autofocus':''); ?>>
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
                    <label for="usia">Usia</label>
                    <!-- <input type="number" name="usia" id="usia" min="0" value="0" class="form-control"> -->
                    <select name="usia" id="usia" class="parameter form-control">
                        <option value="1">Dewasa (Lebih dari 12 Tahun)</option>
                        <option value="2">Anak-Anak (0 Sampai 12 Tahun)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kenderaan">Membawa Kendaraan</label>
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
            </div>
            <div class="col-lg-6">
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
                        <label for="no_hp">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="<?php echo e(old('no_hp')); ?>" placeholder="Nomor yang bisa dihubungi" class="form-control <?php echo e($errors->has('no_hp')?'is-invalid':''); ?>" required <?php echo e($errors->has('no_hp')?'autofocus':''); ?>>
                        <?php if($errors->has('no_hp')): ?>
                        <div class="invalid-feedback" role="alert">
                            <?php echo e($errors->first('no_hp')); ?>

                        </div>
                        <?php endif; ?>
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
                    <label for="tujuan">Kapal (Tujuan)</label>
                    <select name="tujuan" id="tujuan" class="parameter form-control">
                    <?php $__currentLoopData = $kapal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?> (<?php echo e($k->tujuan); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="total_harga">Tarif</label>
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
            </div>  
            </div>
        </div>
        </form>
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
                        <tr><th>Nomor HP</th><td>:</td><td class="t_nohp"></td></tr>
                        <tr><th>Jenis Kelamin</th><td>:</td><td class="t_jk"></td></tr>
                        <tr><th>Agama</th><td>:</td><td class="t_agama" style="text-transform:capitalize"></td></tr>
                        <tr><th>Usia</th><td>:</td><td class="t_usia"></td></tr>
                        <tr><th>Kapal</th><td>:</td><td class="t_kapal"></td></tr>
                        <tr><th>Kelas/Golongan</th><td>:</td><td class="t_kelas" style="text-transform:uppercase"></td></tr>
                        <tr><th>Tarif</th><td>:</td><td class="t_tarif"></td></tr>
                        <tr><th>Status</th><td>:</td><td><h4 class="t_status" style="text-transform:uppercase"></h4></td></tr>
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