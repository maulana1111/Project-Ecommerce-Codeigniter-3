<?php echo $this->session->flashdata('failed') ?>
    <?php echo form_open() ?>
<div class="row">
            <div class="col-7">
                <div class="form-group">
                    <input type="text" class="form-control" name="member_name" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="telp">
                </div>
                <div class="form-group">
                    <textarea rows="5" class="form-control" placeholder="Alamat Pengiriman" name="shipping_address"></textarea>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Retype Password" name="retype_password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" name="submit" value="Daftar" class="btn btn-primary">
            </div>
        </div>
        <?php echo form_close() ?>