<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">History Order Detail</h1>
    </div>
</div>
<?php 
    $x = intval($sum_hs->total);
    $y = intval($sum_ho->totals);
 ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <h3>Description Product</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Member name</th>
                                <th>Product Name</th>
                                <th>Total Items</th>
                                <th>Harga per Item</th>
                                <th>Color Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($hod as $row) { ?>
                                <tr>
                                    <td><?php echo $row->order_code ?></td>
                                    <td><?php echo $row->member_name ?></td>
                                    <td><?php echo $row->product_name ?></td>
                                    <td><?php echo $row->qty ?> items</td>
                                    <td>Rp.<?php echo number_format($row->subtotal, 0,',','.') ?></td>
                                    <td><?php echo $row->color_name ?></td>
                                </tr>
                           <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
                <h3>Shipping Address</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th align="center">Courier name</th>
                                <th align="center">Asal Kota</th>
                                <th align="center">Destination</th>
                                <th align="center">Service</th>
                                <th align="center">Etd (hari)</th>
                                <th>cost</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td align="center"><?php echo $history_shipping->courier_name ?></td>
                                    <td align="center"><?php echo $history_shipping->origin ?></td>
                                    <td align="center"><?php echo $history_shipping->destination ?></td>
                                    <td align="center"><?php echo $history_shipping->description ?></td>
                                    <td align="center"><?php echo $history_shipping->etd ?></td>
                                    <td align="center">Rp.<?php echo number_format($history_shipping->cost, 0,',','.') ?></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <h3>Total Pembayaran</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <?php echo form_open() ?>
                            <tfoot>
                                <tr>
                                    <th colspan="3">TOTAL ITEM</th>
                                    <td colspan="4"><?php echo $ho->total_qty ?> Item</td>
                                </tr>
                                <tr>
                                    <th colspan="3">TOTAL PEMBAYARAN</th>
                                    <td  colspan="4">Rp.<?php echo number_format($x + $y, 0,',','.') ?></td>
                                </tr>
                                <tr>
                                    <th colspan="3">STATUS PEMBAYARAN</th>
                                    <td colspan="4">
                                        <?php
                                            if($ho->status == 1){
                                                $select1 = 'selected=""';
                                            }else{
                                                $select1 = '';
                                            }

                                            if($ho->status == 2){
                                                $select2 = 'selected=""';
                                            }else{
                                                $select2 = '';
                                            }

                                            if($ho->status == 3){
                                                $select3 = 'selected=""';
                                            }else{
                                                $select3 = '';
                                            }

                                            if($ho->status == 4){
                                                $select4 = 'selected=""';
                                            }else{
                                                $select4 = '';
                                            }
                                        ?>

                                        <select name="action" id="">
                                            <option <?php echo $select1 ?> value="1">Belum konfirmasi pembayaran</option>
                                            <option <?php echo $select2 ?> value="2">Konfirmasi pembayaran telah diterima</option>
                                            <option <?php echo $select3 ?> value="3">Pesanan dalam perjalanan</option>
                                            <option <?php echo $select4 ?> value="4">Pesanan Sudah sampai</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="6"><input type="submit" name="submit" class="btn btn-success" value="Change"></td>
                                </tr>
                            </tfoot>
                        <?php echo form_close() ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>