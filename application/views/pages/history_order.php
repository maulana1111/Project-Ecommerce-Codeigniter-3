<?php $this->load->view('components/breadcrumb') ?>

<table class="table table-bordered table-striped">

		<thead>	

			<tr>
				<td>Order Code</td>
				<td>Tanggal</td>
				<td>Total qty (item)</td>
				<td>Total Harga (Rp)</td>
				<td>Status</td>
				<td>lihat</td>
			</tr>

		</thead>

		<tbody>	
			<?php if($history_order){ ?>
				<?php foreach($history_order as $row) { ?>
					<tr>
						
						<th><?php echo $row->code ?></th>
						<th><?php echo date('d/m/Y', strtotime($row->datetime)) ?></th>
						<th><?php echo $row->total_qty ?></th>
						<th><?php echo number_format($row->total_cost, 0,',','.') ?></th>
						<th>
							<?php
								switch ($row->status) {
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
						</th>
						<th>
							<a href="<?php echo site_url('member-area/history-order-detail/'.$row->code) ?>" class="btn btn-primary"><i class="fa fa-search"></i></a>
						</th>
					</tr>
				<?php } ?>
			<?php } ?>

		</tbody>

</table>

<ul style="list-style: none;">
	<li><div class="p-2 d-inline-block rounded-circle bg-danger" ></div> Belum konfirmasi pembayaran</li>
	<li><div class="p-2 d-inline-block rounded-circle bg-warning" ></div> Konfirmasi pembayaran telah diterima</li>
	<li><div class="p-2 d-inline-block rounded-circle bg-success" ></div> Pesanan dalam perjalanan</li>
	<li><div class="p-2 d-inline-block rounded-circle bg-primary" ></div> Pesanan Sudah sampai</li>
</ul>