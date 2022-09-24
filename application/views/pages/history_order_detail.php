<?php $this->load->view('components/breadcrumb') ?>

<table class="table table-bordered">
	<?php if($history_order) { ?>
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
				<td>Rp.<?php echo number_format($history_order->total_cost, 0,'.',',') ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>
					<?php
						switch ($history_order->status) {
								case 1:
									echo '<div class="p-2 d-inline-block rounded-circle bg-danger" ></div>';
									break;
										 	
								case 2:
									echo '<div class="p-2 d-inline-block rounded-circle bg-warning" ></div>';
									break;

								case 3:
									echo '<div class="p-2 d-inline-block rounded-circle bg-success"></div>';
									break;
										 		
								case 4:
									echo '<div class="p-2 d-inline-block rounded-circle bg-primary	"></div>';
									break;	
							} 
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
	<?php } ?>
</table>