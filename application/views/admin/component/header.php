<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">Selamat datang <?php echo $this->session->userdata('admin_name') ?></a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo site_url('admin/login/do_logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li><a href="<?php echo site_url('admin/member_area') ?>"><i class="fa fa-user fa-fw"></i> Member Area</a></li>
                <li><a href="<?php echo site_url('admin/area_admin') ?>"><i class="fa fa-user fa-fw"></i> Area Admin</a></li>
                <li><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard fa-fw"></i> Payment Confirm</a></li>
                <li><a href="<?php echo site_url('admin/history_order') ?>"><i class="fa fa-dashboard fa-fw"></i> History Order</a></li>
                <li>
                    <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Blog<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('admin/blog/category') ?>">Category</a></li>
                        <li><a href="<?php echo site_url('admin/blog/product') ?>">Product</a></li>
                        <li><a href="<?php echo site_url('admin/blog/color') ?>">Color</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>