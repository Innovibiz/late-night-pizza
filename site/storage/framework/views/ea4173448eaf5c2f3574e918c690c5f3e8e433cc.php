<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('svg/logo.png')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Pignose Calender -->
    <link href="<?php echo e(url('admin/plugins/pg-calendar/css/pignose.calendar.min.css')); ?>" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/chartist/css/chartist.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('admin//plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')); ?>">
    <!-- Custom Stylesheet -->
    <link href="<?php echo e(url('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<style>
    .nav-header .brand-logo a{
        padding: 8px!important;
    }
</style>

</head>

<body>
<!--**********************************
        Nav header start
    ***********************************-->
<div class="nav-header" style="background: #fff;">
    <div class="brand-logo" style="padding: 0px!important;">
        <a href="">
            <b class="logo-abbr"><img src="<?php echo e(asset('svg/logo.png')); ?>" alt=""> </b>
            <span class="logo-compact"><img src="<?php echo e(asset('svg/logo.png')); ?>" alt=""></span>
            <span class="brand-title m-auto text-center">
                        <img src="<?php echo e(asset('svg/logo.png')); ?>" alt="" width="75" height="75">
                    </span>
        </a>
    </div>
</div>

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
               
                
               
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span><?php echo e(Auth::guard('admin')->user()->name); ?></span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href=""><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                               

                                <hr class="my-2">
                                
                                <li><a href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i class="icon-key"></i> <span>Logout</span></a>
                                                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form> 
                                                
                                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->
<!--**********************************
           Sidebar start
       ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="<?php echo e(route('admin.home')); ?>" aria-expanded="false">
                   <span class="nav-text"><i class="mdi mdi-speedometer"></i> Dashboard</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                   <span class="nav-text">  Categories</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('categories.index')); ?>">All Categories</a></li>
                    <li><a href="<?php echo e(route('categories.create')); ?>">Add New</a></li>


                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                   <span class="nav-text">  Sizes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('sizes.index')); ?>">All Sizes</a></li>
                    <li><a href="<?php echo e(route('sizes.create')); ?>">Add size</a></li>


                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                   <span class="nav-text">Menu's</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('menus.create')); ?>">Add New</a></li>
                    <li><a href="<?php echo e(route('menus.index')); ?>">All Menu's</a></li>
                    <li><a href="<?php echo e(route('toppings.index')); ?>">Extra Toppings</a></li>
                    <li><a href="<?php echo e(route('prices.index')); ?>">Extra Toppings Prices</a></li>

                   

                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                   <span class="nav-text">Week days Offers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('offers.index')); ?>">All Offers</a></li>
                    <li><a href="<?php echo e(route('offers.create')); ?>">Add New</a></li>


                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                   <span class="nav-text">  Orders</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin.corders')); ?>">Current Orders</a></li>
                    <li><a href="<?php echo e(route('admin.horders')); ?>">Order History</a></li>


                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">Sliders</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('slides.index')); ?>">All Sliders</a></li>
                    <li><a href="<?php echo e(route('slides.create')); ?>">Add New</a></li>

                    <!-- </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                    </a>
                    <ul aria-expanded="false"> -->

                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./form-basic.html"></a></li>

                </ul>
            </li>

        </ul>
    </div>
</div>
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->
<section>
    <?php echo $__env->yieldContent('content'); ?>
</section>

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by  2018</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->


<!--**********************************
    Scripts
***********************************-->
<script src="<?php echo e(asset('admin/plugins/common/common.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/custom.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/settings.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/gleek.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/styleSwitcher.js')); ?>"></script>

<!-- Chartjs -->
<script src="<?php echo e(asset('admin/plugins/chart.js/Chart.bundle.min.js')); ?>"></script>
<!-- Circle progress -->
<script src="<?php echo e(asset('admin/plugins/circle-progress/circle-progress.min.js')); ?>"></script>
<!-- Datamap -->
<script src="<?php echo e(asset('admin/plugins/d3v3/index.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/topojson/topojson.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/datamaps/datamaps.world.min.js')); ?>"></script>
<!-- Morrisjs -->
<script src="<?php echo e(asset('admin/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/morris/morris.min.js')); ?>"></script>
<!-- Pignose Calender -->
<script src="<?php echo e(asset('admin/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/pg-calendar/js/pignose.calendar.min.js')); ?>"></script>
<!-- ChartistJS -->
<script src="<?php echo e(asset('admin/plugins/chartist/js/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/dashboard/dashboard-1.js')); ?>"></script>




<script src="<?php echo e(asset('admin/plugins/tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/tables/js/datatable-init/datatable-basic.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\lnp\site\resources\views/admin/layouts/layout.blade.php ENDPATH**/ ?>