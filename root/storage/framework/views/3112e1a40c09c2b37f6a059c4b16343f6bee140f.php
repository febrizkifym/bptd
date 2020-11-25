<?php $__env->startSection('content'); ?>
<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;  
?>
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Visi & Misi</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list" style="line-height:1.8em">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h4 class="header-text display-5">VISI</h4>
                <p>Visi Direktorat Jenderal Perhubungan Darat 2020-2024 merupakan pengejawantahan dari visi Kementerian Perhubungan 2020-2024 untuk bidang perhhubungan darat dalam rangka mendukung terwujudnya visi Presiden 2020-2024, Adapun pernyataan visi Direktorat Jenderal Perhubungan Darat 2020-2024 adalah sebagai berikut:</p>
                <blockquote>
                    <b>TRANSPORTASI DARAT YANG HANDAL,BERDAYA SAING, DAN MEMBERIKAN NILAI TAMBAH DALAM MENDUKUNG VISI PRESIDEN 2020-2024 (TERWUJUDNYA INDONESIA MAJU YANG BERDAULAT,MANDIRI,DAN BERKEPRIBADIAN, BERLANDASKAN GOTONG-ROYONG.</b>
                </blockquote>
                <div class="garis garis-dark"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <h4 class="header-text display-5">MISI</h4>
                <p>Misi Direktorat Jenderal Perhubungan Darat:</p>
                <ol>
                    <li>Menciptakan sistem pelayanan transportasi darat yang aman, selamat, dan mampu menjangkau masyarakat dan wilayah Indonesia.</li>
                    <li>Menciptakan dan mengorganisasikan transportasi darat, sungai, danau dan penyeberangan serta perkotaan yang berkualitas, berdaya saing dan berkelanjutan.</li>
                    <li>Mendorong berkembangnya industri transportasi darat yang transparan dan akuntabel.</li>
                    <li>Membangun prasarana dan sarana transportasi darat.</li>
                </ol>
                <div class="garis garis-dark"></div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/public', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>