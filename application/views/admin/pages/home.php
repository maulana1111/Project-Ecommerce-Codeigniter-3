<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Payment Confirm</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Notifications
            </div>
             <?php if($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success alert-dismissable">';
                    echo ' <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>';
                    echo $this->session->flashdata('success');
                    echo '</div>';
                }
             ?>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Approve Comments
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Member Name</th>
                                <th>Order Code</th>
                                <th>Nomor Rekening</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                                <th>Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($payment_confirm as $row) { ?>
                                <?php if($row->status == 1 ) { ?>
                                    <tr>
                                        <td><?php echo $row->member_name ?></td>
                                        <td><?php echo $row->order_code ?></td>
                                        <td><?php echo $row->no_account ?></td>
                                        <td class="center"><?php echo $row->paymen_date ?></td>
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
                                        <td class="center"><a href="<?php echo site_url('admin/home_admin/edit_status/'.$row->order_code) ?>" class="btn btn-primary btn-xs" type="button">Konfirmasi Pembayaran</a></td>
                                    </tr>
                                <?php } else{ ?>
                                    <tr>
                                        <td colspan="6" align="center">Belum ada pembayaran</td>
                                    </tr>
                                <?php } ?>
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