<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - Balai Pengelola Transportasi Darat</title>
<meta charset="UTF-8" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap-responsive.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/fullcalendar.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/matrix-style.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/matrix-media.css')); ?>" />
<link href="<?php echo e(asset('dashboard/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/jquery.gritter.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap-wysihtml5.css')); ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/png" sizes="16x16">
<style>
</style>
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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo e(Auth::user()->username); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out</a></li>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
      </ul>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <?php if(Auth::user()->role == 'operator' OR Auth::user()->role == 'admin'): ?>
    <li class="<?php echo e(request()->is('admin/dashboard*') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard')); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="<?php echo e(request()->is('admin/satpel*') ? 'active' : ''); ?>"><a href="<?php echo e(route('satpel.index')); ?>"><i class="icon icon-table"></i> <span>Satuan Pelayanan</span></a> </li>
    <li class="<?php echo e(request()->is('admin/sdm*') ? 'active' : ''); ?>"><a href="<?php echo e(route('sdm.index')); ?>"><i class="icon icon-group"></i> <span>Sumber Daya Manusia</span></a> </li>
    <li class="<?php echo e(request()->is('admin/ppid*') ? 'active' : ''); ?>"><a href="<?php echo e(route('ppid.index')); ?>"><i class="icon icon-info-sign"></i> <span>PPID</span></a> </li>
    <li class="<?php echo e(request()->is('admin/kegiatan*') ? 'active' : ''); ?>"><a href="<?php echo e(route('berita.index')); ?>"><i class="icon icon-pencil"></i> <span>Berita</span></a> </li>
    <li class="<?php echo e(request()->is('admin/video*') ? 'active' : ''); ?>"><a href="<?php echo e(route('video.index')); ?>"><i class="icon icon-film"></i> <span>Galeri Video</span></a> </li>
    
    

    <?php endif; ?>
    <?php if(Auth::user()->role == 'surat' OR Auth::user()->role == 'admin'): ?>    
    <li class="submenu <?php echo e(request()->is('admin/surat*') ? 'active' : ''); ?>"> <a href="#"><i class="icon icon-envelope"></i> <span>Penomoran Surat</span> <span class=""><i class="icon icon-chevron-down"></i></span></a>
      <ul style="display: none;">
        <li class=""><a href="<?php echo e(route('surat.klasifikasi')); ?>"><span>Klasifikasi</span></a> </li>
        <li class=""><a href="<?php echo e(route('surat.index')); ?>"><span>Arsip</span></a> </li>
      </ul>
    </li>
    <?php endif; ?>
    <?php if(Auth::user()->role == 'bulotu'): ?>
    <li class="<?php echo e(request()->is('admin/penumpang*') ? 'active' : ''); ?>"><a href="<?php echo e(route('penumpang.index')); ?>"><i class="icon icon-book"></i> <span>Calon Penumpang</span></a> </li>
    <?php endif; ?>
    <?php if(Auth::user()->role == 'bulotu_admin' OR Auth::user()->role == 'admin'): ?>
    <li class="submenu <?php echo e(request()->is('admin/dalalo*') ? 'active' : ''); ?>"> <a href="#"><i class="icon icon-flag"></i> <span>Bulotu</span> <span class=""><i class="icon icon-chevron-down"></i></span></a>
      <ul style="display: none;">
        <li class=""><a href="<?php echo e(route('penumpang.index')); ?>"><span>Calon Penumpang</span></a> </li>
        <li class=""><a href="<?php echo e(route('kapal.index')); ?>"><span>Daftar Kapal</span></a> </li>
      </ul>
    </li>
    <?php endif; ?>
    <?php if(Auth::user()->role == 'dalalo' OR Auth::user()->role == 'admin'): ?>
    <li class="submenu <?php echo e(request()->is('admin/dalalo*') ? 'active' : ''); ?>"> <a href="#"><i class="icon icon-warning-sign"></i> <span>Dalalo</span> <span class=""><i class="icon icon-chevron-down"></i></span></a>
      <ul style="display: none;">
        <li class=""><a href="<?php echo e(route('dalalo.index')); ?>"><span>Semua Titik</span></a> </li>
        <li class=""><a href="<?php echo e(route('dalalo.ruas_dashboard')); ?>"><span>Ruas</span></a> </li>
      </ul>
    </li>
     <?php endif; ?>
    <?php if(Auth::user()->role == 'admin'): ?>
    <li class="<?php echo e(request()->is('admin/user*') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.index')); ?>"><i class="icon icon-key"></i> <span>User</span></a> </li>
    <?php endif; ?>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo e(route('beranda')); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Kembali ke beranda</a></div>
  </div>
  <div class="container-fluid">
      <?php echo $__env->yieldContent('content'); ?>
  </div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; HUMAS BPTD XXI GORONTALO.</div>
</div>

<script src="<?php echo e(asset('dashboard/js/jquery.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.ui.custom.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.flot.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.flot.resize.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.peity.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.gritter.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.validate.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.wizard.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.uniform.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.dataTables.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.peity.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/bootstrap.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/excanvas.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/fullcalendar.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/select2.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.dashboard.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.interface.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.form_validation.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/matrix.chat.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.form_common.js')); ?>"></script>  
<script src="<?php echo e(asset('dashboard/js/matrix.popover.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.tables.js')); ?>"></script> 
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>   
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
    <?php if($message = Session::get('pesan')): ?>
        $.gritter.add({
            title:	'Info',
            text:	'<?php echo e(Session::get("pesan")); ?>',
            sticky: false
        });
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
