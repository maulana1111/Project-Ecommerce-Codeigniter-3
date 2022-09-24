 <h4 class="bg-faded px-3 py-2 rounded">Ringkasan</h4>
    <table class="table table-striped table-bordered">
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Options</th>
            <th>Qty</th>
            <th>harga (Rp)</th>
            <th>SubTotal (Rp)</th>
        </tr>
    </thead>
    <tbody>
        <?php if($items){ ?>
            <?php foreach($items as $item) { ?>
                <tr>
                    
                    <td><?php echo $item['name'] ?></td>
                    <td>
                        <p class="mb-0">Color</p>
                        <?php echo $this->db->get_where('color', array('id' => $item['options']['color']))->row('color_name') ?>
                    </td>
                    <td class="form-inline">
                        <?php echo $item['qty'] ?>
                    </td>
                    <td><?php echo number_format($item['price'], 0, ',', '.') ?></td>
                    <td><?php echo number_format($item['subtotal'], 0, ',', '.') ?></td>
                </tr>
            <?php } ?>
        <?php }else{ ?>
            <tr>
                <h3>keranjang anda kosong, silahkan masukan </h3>
                <a href="<?php echo site_url('home') ?>" class="btn btn-primary">Belanja Dolo</a>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4"><p class="text-right mb-0">Total (Rp)</p></th>
            <td><?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>
    </tfoot>

</table>