<?php $this->load->view('components/breadcrumb'); ?>

<!--products-->
<div class="card-columns">
    <!--products-->
    <?php $i = 1; foreach($products as $product) { ?>
        <div class="card">
            <img class="card-img-top img-fluid" src="<?php echo base_url() ?>uploads/products/<?php echo $product->thumbnail ?>" alt="Card image cap">
            <div class="card-block">
                <h5 class="card-title"><?php echo $product->product_name ?></h5>
                <p class="card-text">Rp. <?php echo number_format($product->price, 0, ',', '.') ?></p>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $i ?>">Lihat</button>
            </div>
        </div>
    <!--modal-->
    <div class="modal fade" id="myModal<?php echo $i ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $product->product_name ?></h5>
                    <button type="button" class="close" onclick="window.location.reload()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="mx-auto d-block" src="<?php echo base_url() ?>uploads/products/<?php echo $product->thumbnail ?>" alt="">
                        </div>
                        <div class="col-6">
                                <p><?php echo $product->description ?></p> 
                                <select id="color<?php echo $i ?>" class="mb-2">
                                    <?php foreach($this->product_m->get_product_color($product->id) as $color){ ?>
                                        <option value="<?php echo $color->id ?>"><?php echo $color->color_name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="form-group form-inline">
                                    <input type="number" id="qty<?php echo $i ?>" value="1" max="10" min="1" />
                                    <input type="hidden" id="id<?php echo $i ?>" value="<?php echo $product->id ?>" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="beli_button<?php echo $i ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Beli</button><br />
                                    <div id="show_resp<?php echo $i ?>"></div>
                                </div>

                            <script>
                                $(document).ready(function() {
                                    $('#beli_button<?php echo $i ?>').click(function(){

                                        var color = $('#color<?php echo $i ?>').val();
                                        var qty = $('#qty<?php echo $i ?>').val();
                                        var id = $('#id<?php echo $i ?>').val();

                                        $.post('http://localhost/bigshop/shopping-cart/add', {
                                            color: color, qty: qty, id: id }, function(resp) {

                                                $('#show_resp<?php echo $i ?>').html('<a href="<?php echo site_url('shopping-cart') ?>" class="btn btn-success btn-sm">Lihat Keranjang Belanja <i class="fa fa-arrow-right"></i></a>');

                                            });
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.location.reload()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php $i++; } ?>
</div>

<?php $this->load->view('components/pagination') ?>