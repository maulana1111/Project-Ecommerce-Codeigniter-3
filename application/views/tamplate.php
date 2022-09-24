<?php $this->load->view('components/head.php'); ?>
<body>
    
<div class="container">
    <!--header-->
    <?php $this->load->view('components/header.php'); ?>
    <!--navbar-->
    <?php $this->load->view('components/navbar.php'); ?>
    <!--content-->
    <div class="row py-4">
        <div class="col-3">
            <!--category-->
            <?php $this->load->view('components/sidebar_category.php'); ?>
        </div>
        <div class="col-9">
            <!--pages-->
            <?php $this->load->view($page); ?>
            
        </div>
    </div>
    <!--footer-->
    <?php $this->load->view('components/footer'); ?>
</div>

</body>
</html>