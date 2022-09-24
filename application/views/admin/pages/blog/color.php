 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; COLOR</h1>
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
                                <label>Color Name</label>
                                <input class="form-control" type="text" name="color_name" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
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
                                <th>Color name</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($color as $row) { ?>
                                <tr>
                                    <td><?php echo $row->color_name ?></td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/color/edit_color/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/color/delete_color/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>