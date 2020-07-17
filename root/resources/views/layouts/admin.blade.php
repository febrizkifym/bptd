<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - Balai Pengelola Transportasi Darat</title>
<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/matrix-media.css')}}" />
<link href="{{asset('dashboard/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dashboard/css/jquery.gritter.css')}}" />
<link rel="stylesheet" href="{{asset('dashboard/css/bootstrap-wysihtml5.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png" sizes="16x16">
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Admin Dashboard</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{Auth::user()->username}}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
      </ul>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    @if(Auth::user()->role == 'operator' OR Auth::user()->role == 'admin')
    <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="{{ request()->is('admin/satpel*') ? 'active' : '' }}"><a href="{{route('satpel.index')}}"><i class="icon icon-table"></i> <span>Satuan Pelayanan</span></a> </li>
    <li class="{{ request()->is('admin/sdm*') ? 'active' : '' }}"><a href="{{route('sdm.index')}}"><i class="icon icon-group"></i> <span>Sumber Daya Manusia</span></a> </li>
    <li class="{{ request()->is('admin/kegiatan*') ? 'active' : '' }}"><a href="{{route('berita.index')}}"><i class="icon icon-pencil"></i> <span>Berita</span></a> </li>
    <li class="{{ request()->is('admin/video*') ? 'active' : '' }}"><a href="{{route('video.index')}}"><i class="icon icon-facetime-video"></i> <span>Galeri Video</span></a> </li>
    <li class="{{ request()->is('admin/tvinformasi/kegiatan*') ? 'active' : '' }}"><a href="{{route('tvinformasi.kegiatan')}}"><i class="icon icon-film"></i> <span>TV Informasi Kegiatan</span></a> </li>
    <li class="{{ request()->is('admin/tvinformasi/pagu*') ? 'active' : '' }}"><a href="{{route('tvinformasi.pagu')}}"><i class="icon icon-money"></i> <span>TV Informasi Pagu & Realisasi</span></a> </li>
    @endif
    @if(Auth::user()->role == 'surat' OR Auth::user()->role == 'admin')
    <li class="{{ request()->is('admin/surats*') ? 'active' : '' }}"><a href="{{route('surat.index')}}"><i class="icon icon-envelope"></i> <span>Surat</span></a> </li>
    <li class="{{ request()->is('admin/surats*') ? 'active' : '' }}"><a href="{{route('surat.klasifikasi')}}"><i class="icon icon-th-list"></i> <span>Klasifikasi Surat</span></a> </li>
    @endif
    @if(Auth::user()->role == 'bulotu')
    <li class="{{ request()->is('admin/penumpang*') ? 'active' : '' }}"><a href="{{route('penumpang.index')}}"><i class="icon icon-book"></i> <span>Calon Penumpang</span></a> </li>
    @endif
    @if(Auth::user()->role == 'bulotu_admin' OR Auth::user()->role == 'admin')
    <li class="{{ request()->is('admin/penumpang*') ? 'active' : '' }}"><a href="{{route('penumpang.index')}}"><i class="icon icon-book"></i> <span>Calon Penumpang</span></a> </li>
    <li class="{{ request()->is('admin/kapal*') ? 'active' : '' }}"><a href="{{route('kapal.index')}}"><i class="icon icon-flag"></i> <span>Daftar Kapal</span></a> </li>
    @endif
    @if(Auth::user()->role == 'dalalo' OR Auth::user()->role == 'admin')
    <li class="{{ request()->is('admin/dalalo/titik*') ? 'active' : '' }}"><a href="{{route('dalalo.index')}}"><i class="icon icon-warning-sign"></i> <span>Semua Titik</span></a> </li>
    <li class="{{ request()->is('admin/dalalo/ruas*') ? 'active' : '' }}"><a href="{{route('dalalo.ruas_dashboard')}}"><i class="icon icon-arrow-up"></i> <span>Ruas</span></a> </li>
     @endif
    @if(Auth::user()->role == 'admin')
    <li class="{{ request()->is('admin/user*') ? 'active' : '' }}"><a href="{{route('user.index')}}"><i class="icon icon-key"></i> <span>User</span></a> </li>
    @endif
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('beranda')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Kembali ke beranda</a></div>
  </div>
  <div class="container-fluid">
      @yield('content')
  </div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin.</div>
</div>

<script src="{{asset('dashboard/js/jquery.min.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.flot.min.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.validate.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.wizard.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.uniform.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('dashboard/js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('dashboard/js/excanvas.min.js')}}"></script> 
<script src="{{asset('dashboard/js/fullcalendar.min.js')}}"></script> 
<script src="{{asset('dashboard/js/select2.min.js')}}"></script> 
<script src="{{asset('dashboard/js/matrix.js')}}"></script> 
<script src="{{asset('dashboard/js/matrix.dashboard.js')}}"></script> 
<script src="{{asset('dashboard/js/matrix.interface.js')}}"></script> 
<script src="{{asset('dashboard/js/matrix.form_validation.js')}}"></script>
<script src="{{asset('dashboard/js/matrix.chat.js')}}"></script> 
<script src="{{asset('dashboard/js/matrix.form_common.js')}}"></script>  
<script src="{{asset('dashboard/js/matrix.popover.js')}}"></script> 
<script src="{{asset('dashboard/js/matrix.tables.js')}}"></script> 
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>   
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
    function goPage (newURL) {
      if (newURL != "") {
          if (newURL == "-" ) {
              resetMenu();            
          }
          else {  
            document.location.href = newURL;
          }
      }
    }
    function resetMenu() {
      document.gomenu.selector.selectedIndex = 2;
    }
    $('.data-table').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>'
    });
    @if ($message = Session::get('pesan'))
        $.gritter.add({
            title:	'Info',
            text:	'{{Session::get("pesan")}}',
            sticky: false
        });
    @endif
</script>
@yield('script')
</body>
</html>
