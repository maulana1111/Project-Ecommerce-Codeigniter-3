<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table class="table-bordered">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>qty</th>
			<th>price</th>
			<th>sub total</th>
			<th>row id</th>
			<th>action</th>
		</tr>
			<?php foreach($items as $item) { ?>
		<tr>
				<td><?php echo $item['id'] ?></td>
				<td><?php echo $item['name'] ?></td>
				<td><?php echo $item['qty'] ?></td>
				<td><?php echo $item['rowid'] ?></td>
				<td><?php echo number_format($item['price'], 0, ',', '.') ?></td>
				<td><?php echo number_format($item['subtotal'], 0, ',', '.') ?></td>
				<td><a href="">Update</a> | <a href="">Delete</a></td>

		</tr>
			<?php } ?>
	</table>
	<h1>TOTAL Rp. <?php echo number_format($this->cart->total(), 0, ',', '.'); ?></h1>

</body>
</html>