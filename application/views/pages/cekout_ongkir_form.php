<pre>
<?php //print_r($province) ?>
</pre>
<div class="modal fade"  id="cekOngkirModal" tabindex="-1" role="dialog" aria-labelledby="cekOngkirModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cek ongkir</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('checkout/check_shipping_cost') ?>

					<div class="form-group">
						<label for="">kurir</label>
						<select name="courier" style="width: 100%;">
							<option value="">-- Pilih kurir --</option>
							<option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
							<option value="pos">POS Indonesia (POS)</option>
							<option value="tiki">Citra Van Titipan Kilat (TIKI)</option>
						</select>

					</div>

					<div class="form-group">
						<label for="">Asal</label>

						<select name="origin_province" style="width: 100%;" id="origin_province">
							<option value="">-- Pilih Provinsi --</option>
							<?php foreach($province->rajaongkir->results as $prov) { ?>
								<option value="<?php echo $prov->province_id ?>"><?php echo $prov->province ?></option>
							<?php } ?>
						</select>

						<select name="origin_city" class="d-block" style="width: 100%;" id="origin_city">
							<option value="">-- Pilih Kota --</option>
						</select>

					</div>

					<div class="form-group">

						<label for="">Tujuan</label>

						<select name="destination_province" class="d-block" style="width: 100%;" id="destination_province">
							<option value="">-- Pilih Provinsi --</option>
							<?php foreach($province->rajaongkir->results as $prov) { ?>
								<option value="<?php echo $prov->province_id ?>"><?php echo $prov->province ?></option>
							<?php } ?>
						</select>

						<select name="destination_city" class="d-block" style="width: 100%;" id="destination_city">
							<option value="">-- Pilih Kota --</option>
						</select>

					</div>

					<div class="form-group">
						<input id="cek_ongkir_submit" name="cek_ongkir_submit" type="submit" class="btn btn-primary form-control" value="Cek ongkir">
					</div>
				<?php echo form_close() ?>

				<script>
					$(document).ready(function() {

						$('#origin_province').change(function() {

							var province_id = $('#origin_province').val();
							$.get('<?php echo site_url('checkout/get_city_by_province/') ?>' + province_id, function(resp) { 

								$('#origin_city').html(resp);

							});

						});

						$('#destination_province').change(function() {

							var province_id = $('#destination_province').val();
							$.get('<?php echo site_url('checkout/get_city_by_province/') ?>' + province_id, function(resp) { 

								$('#destination_city').html(resp);

							});

						});

					})
				</script>

			</div>
		</div>
	</div>
</div>