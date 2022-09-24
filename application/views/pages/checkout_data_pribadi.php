 <h4 class="bg-faded px-3 py-2 rounded">
    <span class="text-danger">*</span>Data Pribadi 
    <?php if( ! $this->session->userdata('member_logged_in')) { ?>
        <a href="#" class="text-underline" data-toggle="modal" data-target="#loginModal">Sudah Punya Akun</a>
    <?php } ?>
 </h4>
        
    <?php if($data_member){ ?>

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

    <?php }else{ ?>

        <h3>Silahkan Login Terlebih Dahulu</h3>

    <?php } ?>