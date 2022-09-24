<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">History Order</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Member name</th>
                                <th>Code</th>
                                <th>Total Items</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($history_order as $row) { ?>
                                <tr>
                                    <td><?php echo $row->member_name ?></td>
                                    <td><?php echo $row->code ?></td>
                                    <td><?php echo $row->total_qty ?> items</td>
                                    <td><?php echo $row->datetime ?></td>
                                    <td>
                                       <?php
                                                switch ($row->status) {
                                                    case 1:
                                                        echo '<div class="label label-danger"> </div>';
                                                        break;
                                                    
                                                    case 2:
                                                        echo '<div class="label label-warning"> </div>';
                                                        break;

                                                    case 3:
                                                        echo '<div class="label label-success"> </div>';
                                                        break;
                                                        
                                                    case 4:
                                                        echo '<div class="label label-primary"> </div>';
                                                        break;  
                                                 } 
                                            ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('admin/history_order/edit_hod/'.$row->code) ?>" class="btn btn-success">SEE &rarr;</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <ul style="list-style: none;">
                        <li><div class="label label-danger" > </div> Belum konfirmasi pembayaran</li>
                        <li><div class="label label-warning" > </div> Konfirmasi pembayaran telah diterima</li>
                        <li><div class="label label-success" > </div> Pesanan dalam perjalanan</li>
                        <li><div class="label label-primary" > </div> Pesanan Sudah sampai</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>