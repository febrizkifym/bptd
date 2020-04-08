<!DOCTYPE HTML>
<html lang="en">
<?php require_once('_template/head.php'); ?>
<body>
<?php require_once('_template/nav.php'); ?>
<!-- CONTENT -->

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" style="max-height: 500px;">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/1.jpeg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/2.jpeg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/3.jpeg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">    
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- END CAROUSEL -->
<section id="pers">
    <div class="container">
   <h1>Kegiatan</h1>
        <div class="tab-content">
            <div id="berita" class="tab-pane active" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
<!--                        <h3 class="label-section">TERKINI</h3>-->
                        <p class="border-role"></p>
                        <div class="feed clearfix">
                            <div class="feed-thumbnail">
                                <img src="img/thumbnail.png" alt="" class="thumbnail-img">
                            </div>
                            <div class="feed-content">
                                <span class="feed-date">8 Januari 2019</span>
                                <a href="#" class="feed-link"><h5 class="feed-title">Contoh Judul</h5></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore quibusdam, vero ducimus iusto esse quia</p>
                            </div>
                        </div>
                        <p class="border-role"></p>
                        <div class="feed clearfix">
                            <div class="feed-thumbnail">
                                <img src="img/thumbnail.png" alt="" class="thumbnail-img">
                            </div>
                            <div class="feed-content">
                                <span class="feed-date">8 Januari 2019</span>
                                <a href="#" class="feed-link"><h5 class="feed-title">Contoh Judul</h5></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore quibusdam, vero ducimus iusto esse quia</p>
                            </div>
                        </div>
                        <p class="border-role"></p>
                        <div class="feed clearfix">
                            <div class="feed-thumbnail">
                                <img src="img/thumbnail.png" alt="" class="thumbnail-img">
                            </div>
                            <div class="feed-content">
                                <span class="feed-date">8 Januari 2019</span>
                                <a href="#" class="feed-link"><h5 class="feed-title">Contoh Judul</h5></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore quibusdam, vero ducimus iusto esse quia</p>
                            </div>
                        </div>
                        <p class="border-role"></p>
                        <a href="#" class="feed-link"><h3 class="label-section">LIHAT SEMUA >></h3></a>
                    </div>
                </div>
            </div>
            <div id="artikel" class="tab-pane" role="tabpanel">
            
            </div>
            <div id="siaran" class="tab-pane" role="tabpanel">
                
            </div>
        </div>
    </div>
</section>

<!-- END CONTENT -->
<?php require_once('_template/footer.php'); ?>
<?php require_once('_template/js.php'); ?>
</body>
</html>