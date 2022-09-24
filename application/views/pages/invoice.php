<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>	
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>icons/font-awesome/css/font-awesome.css">
    <script src="<?php echo base_url() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
</head>
<body>

	<table class="table table-bordered">
		<tr>
			<td>Atas nama</td>
			<td><?php echo $this->session->userdata('member_name') ?></td>
		</tr>
		<tr>
			<td>Code</td>
			<td><?php echo $history_order->code ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td><?php echo date('d/m/Y', strtotime($history_order->datetime)) ?></td>
		</tr>
		<tr>
			<td>Total Qty</td>
			<td><?php echo $history_order->total_qty ?> item</td>
		</tr>
		<tr>
			<td>Total Biaya</td>
			<td>Rp. <?php echo number_format($history_order->total_cost, 0,'.',',') ?></td>
		</tr>
	</table>

</body>
</html>

