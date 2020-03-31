<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</title>
    <!--
    ======================================
    |                                    |
    | Made By    : Febrizki Mawikere     |
    | Email      : febrizkifym@gmail.com |
    | Insta      : @febrizkifym_         |
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="d-flex flex-row">
                <a class="navbar-brand" href="{{route('beranda')}}">
                    <img src="{{asset('img/kemenhub.png')}}" width="100" height="100" class="d-inline-block align-center" alt="">
                </a>
                <div class="d-flex flex-column">
                    <a href="{{route('beranda')}}" class="navbar-text brand1">Balai Pengelola Transportasi Darat</a>
                    <a href="{{route('beranda')}}" class="navbar-text brand2">Wilayah XXI Provinsi Gorontalo</a>
                </div>
            </div>
            <div class="collapse navbar-collapse d-flex flex-column flex-wrap" id="navbarNav">
                <ul class="navbar-nav ml-auto navigation">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('beranda')}}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown {{ request()->is('profil*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="profil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profil">
                            <a class="dropdown-item dropdown-accordion" data-toggle="collapse" href="#bptd" role="button" aria-expanded="false" aria-controls="bptd">BPTD</a>
                            <div class="collapse" id="bptd">
                                  <?php
                                    use Illuminate\Support\Str;
                                    ?>
                                   @foreach(App\Satpel::all() as $sp)
                                    <a class="dropdown-item dropdown-accordion-item" href="{{route('satpel',[$sp->id,Str::slug($sp->nama,'-')])}}">{{Str::limit($sp->nama,28)}}</a>
                                    @endforeach
                            </div>
                            <a class="dropdown-item" href="{{route('sejarah')}}">Sejarah</a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('berita*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('berita')}}">Berita</a>
                    </li>
                    <li class="nav-item {{ request()->is('galeri*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('galeri')}}">Galeri</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->username}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="login">
                            <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="label-footer">Profil</h3>
                    <ul class="link-footer">
                        <li><a href="{{route('sejarah')}}" class="link-footer">Sejarah</a></li>
                        <li><a href="{{route('satpel',[1,'kantor-bptd'])}}" class="link-footer">Struktur Kantor BPTD</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="label-footer">Galeri</h3>
                    <ul class="link-footer">
                        <li><a href="#" class="link-footer">Video</a></li>
                        <li><a href="#" class="link-footer">Foto</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="label-footer">Social Media</h3>
                    <ul class="link-footer">
                        <li><a href="#" class="link-footer">Instagram</a></li>
                        <li><a href="#" class="link-footer">Facebook</a></li>
                        <li><a href="#" class="link-footer">Youtube</a></li>
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
                    <p style="font-size:9pt">Copyright All Rights Reserved 2020. Balai Pengelola Transportasi Darat Wilayah XXI Provinsi Gorontalo</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
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
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
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