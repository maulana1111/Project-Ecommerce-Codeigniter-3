<?php $this->load->view('components/breadcrumb') ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Order Kode</th>
			<th>Tanggal</th>
			<th>Invoice</th>
			<th>Konfirmasi</th>
		</tr>
	</thead>
	<tbody>
		<?php if($payment_bill){ ?>
			<?php foreach($payment_bill as $row) { ?>
				<tr>
					<td><?php echo $row->code ?></td>
					<td><?php echo date('d/m/Y', strtotime($row->datetime)) ?></td>
					<td>
						<a href="<?php echo site_url('member-area/invoice/'.$row->code) ?>" class="btn btn-success">
							<i class="fa fa-sticky-note-o"></i>
						</a>
					</td>
					<td>
						<a href="<?php echo site_url('member-area/payment-confirm/'.$row->code) ?>" class="btn btn-primary">
							<i class="fa fa-arrow-right"></i>
						</a>
					</td>
				</tr>
			<?php } ?>
		<?php } ?>
	</tbody>
</table>