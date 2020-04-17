<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard - Balai Pengelola Transportasi Darat</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap-responsive.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/fullcalendar.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/matrix-style.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/matrix-media.css')); ?>" />
<link href="<?php echo e(asset('dashboard/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/jquery.gritter.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap-wysihtml5.css')); ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/png" sizes="16x16">
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
    <li class="<?php echo e(request()->is('admin/dashboard*') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard')); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="<?php echo e(request()->is('admin/kegiatan*') ? 'active' : ''); ?>"><a href="<?php echo e(route('berita.index')); ?>"><i class="icon icon-pencil"></i> <span>Berita</span></a> </li>
    <li class="<?php echo e(request()->is('admin/satpel*') ? 'active' : ''); ?>"><a href="<?php echo e(route('satpel.index')); ?>"><i class="icon icon-table"></i> <span>Satuan Pelayanan</span></a> </li>
    <li class="<?php echo e(request()->is('admin/sdm*') ? 'active' : ''); ?>"><a href="<?php echo e(route('sdm.index')); ?>"><i class="icon icon-group"></i> <span>Sumber Daya Manusia</span></a> </li>
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
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin.</div>
</div>

<script src="<?php echo e(asset('dashboard/js/excanvas.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.ui.custom.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/bootstrap.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.flot.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.flot.resize.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.peity.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/fullcalendar.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.dashboard.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.gritter.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.interface.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.chat.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.validate.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.form_validation.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.wizard.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.uniform.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/select2.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.popover.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.dataTables.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/matrix.tables.js')); ?>"></script> 

<script src="<?php echo e(asset('dashboard/js/wysihtml5-0.3.0.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/jquery.peity.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dashboard/js/bootstrap-wysihtml5.js')); ?>"></script> 
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script> 

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
    }

    // resets the menu selection upon entry to this page:
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
            text:	'Update Berhasil',
            sticky: false
        });
    <?php endif; ?>
//	$('.wysihtml5').wysihtml5();
    CKEDITOR.replace( 'post' );
    CKEDITOR.replace( 'tupoksi' );
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
