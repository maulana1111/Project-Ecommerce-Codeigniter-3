<!DOCTYPE html>
<html>
<?php $this->load->view("admin/component/head") ?>
<body>
    <div id="wrapper">
        <?php $this->load->view("admin/component/header") ?>
        <div id="page-wrapper">
            <?php
                $this->load->view($page);
            ?>
        </div>
    </div>
    <?php $this->load->view("admin/component/footer") ?>
</body>
</html>
