<div class="row py-3">
    <div class="div col-3">
        <a href="?"><img src="<?php echo base_url() ?>assets/logo.png" alt=""></a>
    </div>
    <div class="col-9">
        <div class="dropdown float-right">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i> (<?php echo $this->cart->total_items() ?> Item)
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo site_url('shopping-cart') ?>">Lihat <i class="fa fa-arrow-right"></i></a>
                <a class="dropdown-item" href="<?php echo site_url('checkout') ?>">Checkout <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>