<?php $this->load->view('components/breadcrumb') ?>

 <table class="table table-striped table-bordered">

            <tbody>
                
                <tr>
                    <th>Nama legkap</th>
                    <th><?php echo $data_member->member_name ?></th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th><?php echo $data_member->email ?></th>
                </tr>
                <tr>
                    <th>Nomor Telpon</th>
                    <th><?php echo $data_member->telp ?></th>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th><?php echo $data_member->shipping_address ?></th>
                </tr>
            </tbody>
            
     </table>