 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Admin Area</h1>
    </div>
</div>

<?php 
            if($this->session->flashdata('success')){
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('success');
                echo '</div>';
            }
          ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo form_open() ?>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $data_admin->username ?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" />
                            </div>
                            <div class="form-group">
                                <label>Retype Password</label>
                                <input class="form-control" type="text" name="retype_password" />
                            </div>
                            <input type="hidden" name="data_id" value="<?php echo $data_admin->id ?>">
                            <button type="submit" name="submit" class="btn btn-success">Change</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <td><?php echo $row->username ?></td>
                                    <td><?php echo $row->password ?></td>
                                    <td class="center"><a href="<?php echo site_url('admin/area_admin/edit_admin/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                    <td class="center"><a href="<?php echo site_url('admin/area_admin/delete_admin/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>