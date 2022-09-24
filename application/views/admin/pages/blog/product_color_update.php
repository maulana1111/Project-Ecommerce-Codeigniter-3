<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Update Color</h1>
    </div>
</div>
            <?php
            if($this->session->flashdata('success')){
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('success');
                echo '</div>';
            }

             if($this->session->flashdata('failed')){
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('failed');
                echo '</div>';
            }
            ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Color
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo form_open() ?>
                            <div class="form-group">
                                <label>Color name</label>
                                <select class="form-control" name="color">
                                    <option value=""> - choose - </option>
                                    <?php foreach($color as $row) { ?>
                                            <option value="<?php echo $row->id ?>"><?php echo $row->color_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success" value="Update Color">
                            <input type="hidden" name="product_id" value="<?php echo $data1->id ?>">
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
                <h3>Data Product</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><?php echo $data1->category_name ?></td>
                                    <td><?php echo $data1->product_name ?></td>
                                    <td><?php echo $data1->description ?></td>
                                    <td>Rp.<?php echo number_format($data1->price, 0,',','.') ?></td>
                                    <td><img src="<?php echo base_url() ?>uploads/products/<?php echo $data1->thumbnail ?>" width="88" class="img-responsive" /></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <h3>Data Color</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data2 as $row){ ?>
                                <tr>
                                    <td>
                                        <?php echo $row->color_name ?>
                                    </td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/product/update_product_color/'.$data1->id.'/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/product/delete_product_color/'.$data1->id.'/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                </tr>
                            <?php } ?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>