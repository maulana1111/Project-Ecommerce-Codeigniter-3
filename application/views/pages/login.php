<div class="modal fade"  id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open() ?>
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="submit" name="login_submit" class="btn btn-primary form-control" value="Login">
						<input type="hidden" name="current_url" value="<?php echo base64_encode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>">
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>