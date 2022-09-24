<!--products-->
<?php $this->load->view('components/breadcrumb')?>

<!--cart-->

<?php if($this->session->flashdata('success')){

       echo '<div class="alert alert-success">';
       echo $this->session->flashdata('success');
       echo '</div>';

} ?>

<?php if($items){ ?>

<?php echo form_open('shopping-cart/update') ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Item</th>
            <th>Options</th>
            <th>Qty</th>
            <th>harga (Rp)</th>
            <th>SubTotal (Rp)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $item) { ?>
        <tr>
            <td><a href="<?php echo site_url('shopping-cart/delete/'.$item['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
            <td><?php echo $item['name'] ?></td>
            <td>
                <p class="mb-0">Color</p>
                <select name="color[]" class="mb-2">
                    <?php foreach($this->product_m->get_product_color($item['id']) as $color){ ?>
                        <?php

                        if($color->id == $item['options']['color']){
                            $select = 'selected=""';
                        } else {
                            $select = '';
                        }

                        ?>
                        <option <?php echo $select ?> value="<?php echo $color->id ?>"><?php echo $color->color_name ?></option>
                    <?php } ?>
                </select>
            </td>
            <td class="form-inline border-0">
                <input type="number" name="qty[]" value="<?php echo $item['qty'] ?>" max="10" min="1" />
                <input type="hidden" name="rowid[]" value="<?php echo $item['rowid'] ?>">
                <input type="hidden" name="id[]" value="<?php echo $item['id'] ?>">
            </td>
            <td><?php echo number_format($item['price'], 0, ',', '.') ?></td>
            <td><?php echo number_format($item['subtotal'], 0, ',', '.') ?></td>
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5"><p class="text-right mb-0">Total (Rp)</p></th>
            <td><?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>
    </tfoot>
</table>

<p class="py-2">
    <button type="submit" class="btn btn-success float-left">Update Cart</button>
    <a href="<?php echo site_url('checkout') ?>" class="btn btn-primary float-right">Check Out <i class="fa fa-arrow-right"></i></a>
</p>


<?php echo form_close() ?>
<?php }else{ ?>

    <h1>keranjang anda kosong, silahkan masukan </h1>
    <a href="<?php echo site_url('home') ?>" class="btn btn-primary">Belanja Dolo</a>

<?php } ?>