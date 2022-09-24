<?php
// echo "<pre>";
//  print_r($this->session->userdata());
//  echo "<pre>";
 ?>
<h4 class="bg-faded px-3 py-2 rounded">
    <span class="text-danger">*</span>Ongkos Kirim
    <a href="" data-toggle="modal" data-target="#cekOngkirModal">Cek ongkir</a>  
</h4>
    <?php if($this->session->userdata('shipping_cost')) { ?>
        <div class="alert alert-success">
            <ul>
                <?php foreach($shipping_cost->rajaongkir->results as $results) { ?>
                    <li>
                        <h4>Kurir : <?php echo $results->name ?></h4>
                        <input type="hidden" name="courier_name" value="<?php echo $results->name ?>">
                        <input type="hidden" name="courier_code" value="<?php echo $results->code ?>">
                    </li>
                <?php } ?>
                <li>
                    <h4>Kota asal : <?php echo $shipping_cost->rajaongkir->origin_details->city_name?></h4>
                    <input type="hidden" name="origin" value="<?php echo $shipping_cost->rajaongkir->origin_details->city_name ?>">
                </li>
                <li>
                    <h4>Kota tujuan : <?php echo $shipping_cost->rajaongkir->destination_details->city_name?></h4>
                    <input type="hidden" name="destination" value="<?php echo $shipping_cost->rajaongkir->destination_details->city_name ?>">
                </li>
                <li>
                    <h4>Berat : <?php echo number_format($shipping_cost->rajaongkir->query->weight, 0,'','.') ?> (Gram)</h4>
                    <input type="hidden" name="weight" value="<?php echo $shipping_cost->rajaongkir->query->weight ?>">
                </li>
            </ul>
        </div>
    <?php } ?>

    <table class="table">
            <thead>
                <tr>
                    <th>Pilih</th>
                    <th>Servis</th>
                    <th>Deskripsi</th>
                    <th>Biaya (Rp)</th>
                    <th>ETD (hari)</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->session->userdata('shipping_cost')) { ?>

                    <?php foreach($shipping_cost->rajaongkir->results as $results) { ?>
                        <?php if(count($results->costs) > 0) { ?>
                            <?php $i = 1; foreach($results->costs as $costs) { ?>
                                <tr>
                                    <td>
                                        <input type="radio" name="checked_number" value="<?php echo $i ?>" <?php if($i == 1) echo 'checked=""' ?> />
                                    </td>
                                    <td>
                                        <?php echo $costs->service ?>
                                        <input type="hidden" name="service<?php echo $i ?>" value="<?php echo $costs->service ?>">
                                    </td>
                                    <td>
                                        <?php echo $costs->description ?>
                                        <input type="hidden" name="description<?php echo $i ?>" value="<?php echo $costs->description ?>">
                                    </td>
                                    <?php foreach($costs->cost as $cost) { ?>
                                        <td>
                                            <?php echo number_format($cost->value, 0,',','.') ?>
                                            <input type="hidden" name="cost<?php echo $i ?>" value="<?php echo $cost->value ?>">
                                        </td>
                                        <td>
                                            <?php echo $cost->etd ?>
                                            <input type="hidden" name="etd<?php echo $i ?>" value="<?php echo $cost->etd ?>">        
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; } ?>

                        <?php } else { ?>
                             <tr>
                                <td colspan="5" class="alert alert-danger">Mohon maaf, layanan tidak tersedia.</td>
                            </tr>
                        <?php } ?>

                    <?php } ?>

                <?php } else { ?>

                <tr>
                    <td colspan="5">Silahkan pilih kota asal dan destinasi.</td>
                </tr>

                <?php } ?>
            </tbody>
     </table>