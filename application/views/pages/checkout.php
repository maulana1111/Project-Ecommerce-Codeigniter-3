<!--products-->
<?php $this->load->view('components/breadcrumb') ?>
<?php echo $this->session->flashdata('failed') ?>
<!--checkout-->
<?php echo form_open('checkout/order_submit') ?>
    <!--Data Pribadi-->
        <?php $this->load->view('pages/checkout_data_pribadi') ?>
    <!--Ongkos Kirim-->
        <?php $this->load->view('pages/checkout_ongkir') ?>
    <!--Ringkasan-->
        <?php $this->load->view('pages/checkout_ringkasan') ?>
    <!--finish order-->
    <p class="py-2">
        <button class="btn btn-primary float-left"><i class="fa fa-arrow-left"></i> Kembali ke Keranjang Belanja</button>
        <button class="btn btn-primary float-right" type="submit">Selesaikan Pesanan <i class="fa fa-arrow-right"></i></button>
    </p> 
<?php echo form_close()  ?>