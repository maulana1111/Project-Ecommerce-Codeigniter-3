<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog &raquo; Post</h1>
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
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo form_open_multipart() ?>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option value=""> - choose - </option>
                                    <?php $i = 1; foreach($category as $row)  { ?>
                                            <option value="<?php echo $i ?>"><?php echo $row->category_name ?></option>
                                    <?php $i++; } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" type="text" name="product_name" />
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" type="text" name="harga" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="foto" />
                            </div>
                            <div class="form-group">
                                <label>Berat</label>
                                <input class="form-control" type="text" name="berat" />
                            </div>
                            <div class="form-group">
                                <label>Input Color</label>
                                <br>
                                <?php foreach($color as $row) { ?>
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="<?php echo $row->id ?>"> <?php echo $row->color_name ?>
                                <?php } ?>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success" value="Save">
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
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Color</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product as $row) { ?>
                                <tr>
                                    <td><?php echo $row->category_name ?></td>
                                    <td><?php echo $row->product_name ?></td>
                                    <td><?php echo $row->description ?></td>
                                    <td>Rp.<?php echo number_format($row->price, 0,',','.') ?></td>
                                    <td><img src="<?php echo base_url() ?>uploads/products/<?php echo $row->thumbnail ?>" width="88" class="img-responsive" /></td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/product/product_color/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Lihat Warna</a></td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/product/update_product/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                    <td class="center"><a href="<?php echo site_url('admin/blog/product/delete_product/'.$row->id) ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>