<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php echo $__env->yieldContent('meta'); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/png" sizes="16x16">
    <title><?php echo $__env->yieldContent('judul'); ?> - BPTD XXI Gorontalo</title>
    <!--
    ======================================
    |                                    |
    | Made By    : Febrizki Mawikere     |
    | Email      : febrizkifym@gmail.com |
    | Insta      : @febrizkifym_                  |
    |                                    |
    ======================================
    -->
</head>
<body>
    <div class="navbar topnav">
       <div class="container">
            <span class="navbar-text">
                Jl. Beringin, Kel. Huangobotu, Kec. Dungingi
            </span>
       </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <div class="d-flex flex-row">
                <a class="navbar-brand" href="<?php echo e(route('beranda')); ?>">
                    <img src="<?php echo e(asset('img/brand.png')); ?>" height="100" width="600" class="d-inline-block align-center img-fluid" alt="">
                </a>
                <!-- <div class="d-flex flex-column">
                    <a href="<?php echo e(route('beranda')); ?>" class="navbar-text brand1">Balai Pengelola Transportasi Darat</a>
                    <a href="<?php echo e(route('beranda')); ?>" class="navbar-text brand2">Wilayah XXI Provinsi Gorontalo</a>
                </div> -->
            </div>
            <div class="collapse navbar-collapse d-flex flex-column flex-wrap" id="navbarNav">
                <ul class="navbar-nav navigation">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('beranda')); ?>">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->is('profil*') ? 'active' : ''); ?>" href="#" id="profil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profil">
                            <a class="dropdown-item dropdown-accordion" data-toggle="collapse" href="#bptd" role="button" aria-expanded="false" aria-controls="bptd">BPTD <i class="fas fa-caret-down"></i></a>
                            <div class="collapse" id="bptd">
                                  <?php
                                    use Illuminate\Support\Str;
                                    ?>
                                   <?php $__currentLoopData = App\Satpel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item dropdown-accordion-item" href="<?php echo e(route('satpel',[$sp->id,Str::slug($sp->nama,'-')])); ?>"><?php echo e(Str::limit($sp->nama,28)); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a class="dropdown-item" href="<?php echo e(route('sejarah')); ?>">Sejarah</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('kegiatan*') ? 'active' : ''); ?>" href="<?php echo e(route('berita')); ?>">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('galeri*') ? 'active' : ''); ?>" href="<?php echo e(route('galeri')); ?>">Galeri</a>
                    </li>
                    <?php if(Auth::check()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(Auth::user()->username); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="login">
                            <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php echo $__env->yieldContent('content'); ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="label-footer">Profil</h3>
                    <ul class="link-footer">
                        <li><a href="<?php echo e(route('sejarah')); ?>" class="link-footer">Sejarah</a></li>
                        <li><a href="<?php echo e(route('satpel',[1,'kantor-bptd'])); ?>" class="link-footer">Struktur Kantor BPTD</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="label-footer">Lensa</h3>
                    <ul class="link-footer">
                        <li><a href="<?php echo e(route('berita')); ?>" class="link-footer">Berita Kegiatan</a></li>
                        <li><a href="<?php echo e(route('galeri')); ?>" class="link-footer">Galeri Foto</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="label-footer">Social Media</h3>
                    <ul class="link-footer">
                        <li><a href="https://www.instagram.com/bptd_gorontalo/" class="link-footer">Instagram</a></li>
                        <li><a href="#" class="link-footer">Facebook</a></li>
                        <li><a href="https://www.youtube.com/channel/UCYZsIwfp66OG4Sg-zoA9_hw" class="link-footer">Youtube</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="label-footer">Kontak Kami</h3>
                    <p class="link-footer">
                        Kantor BPTD Wil XXI Provinsi Gorontalo (0435 8532 837) <br>
                        bptdgorontalo@gmail.com <br>
                        Jl.Beringin, Kec. Dungingi.
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <p class="border-footer"></p>
                    <p style="font-size:9pt">Copyright All Rights Reserved 2020. Humas Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script>

    $(".dropdown-accordion").click('a[data-toggle="collapse"]',function(event){
      event.preventDefault();
      event.stopPropagation();
          $($(this).attr('href')).collapse('toggle');
    });


    var ktrigger = $("#kontakTrigger");
    ktrigger.click(function(){
        var kisi = $(".kontak-isi");
        if(kisi.is(':visible')){
            kisi.hide(300);
        }else{
            kisi.show(300);
        }
    });
        
        let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param  setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param  setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });
    </script>
</body>
</html>