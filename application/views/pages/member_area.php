<!--products-->
<?php $this->load->view('components/breadcrumb')?>

<div class="card-columns">
    <div class="card bg-primary">
        <div class="card-block">
            <a href="<?php  echo site_url('member-area/my-profile') ?>" class="d-block text-center text-white"><i class="fa fa-user"></i> My Profile</a>
        </div>
    </div>
    <div class="card bg-primary">
        <div class="card-block">
            <a href="<?php  echo site_url('member-area/history-order') ?>" class="d-block text-center text-white"><i class="fa fa-shopping-cart"></i> History Belanja</a>
        </div>
    </div>
    <div class="card bg-primary">
        <div class="card-block">
            <a href="<?php  echo site_url('member-area/payment-billing') ?>" class="d-block text-center text-white"><i class="fa fa-money"></i> Tagihan Pembayaran</a>
        </div>
    </div>
</div>