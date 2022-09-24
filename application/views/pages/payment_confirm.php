<?php echo form_open() ?>

	<div class="form-group">
		<label>Order Code</label>
		<input type="text" value="<?php echo $order_code ?>" name="order_code" class="form-control">
	</div>
	<div class="form-group">
		<label>No. Account/Rekening</label>
		<input type="text" name="no_account" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal Transfer</label>
		<input type="text" name="payment_date" class="form-control" id="datepicker">
	</div>
	<div class="form-group">
		<input type="submit" name="" value="Konfirmasi" class="form-control">
	</div>

<?php echo form_close() ?>