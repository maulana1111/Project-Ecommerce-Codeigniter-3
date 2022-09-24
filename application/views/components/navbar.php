<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('product') ?>">All Products</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="?member-area">Member Area</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if($this->session->userdata('member_logged_in')) { ?>
                        <a class="dropdown-item" href="<?php echo site_url('member-area ') ?>">Masuk <i class="fa fa-arrow-right"></i></a>
                        <a class="dropdown-item" href="<?php echo site_url('home/do_logout') ?>">Logout</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                        <br>
                        <a class="dropdown-item" href="<?php echo site_url('Daftar_member') ?>">Daftar</a>
                    <?php } ?>
                </div>
            </li>
            <li>
                <a class="nav-link" href="<?php echo site_url('admin/login') ?>">Login Admin</a>
            </li>
        </ul>
        <?php echo form_open('product/search','form-inline my-2 my-lg-0') ?>
            <input name="keyword" class="form-control mr-sm-2" type="text" placeholder="Pencarian">
            <button name="search-submit"class="btn btn-outline-success my-2 my-sm-0" type="submit">
                <i class="fa fa-search"></i>
            </button>
        <?php echo form_close() ?>
    </div>
</nav>