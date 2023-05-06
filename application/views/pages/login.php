<div id="container">
	<h1>Welcome to Scentinel</h1>

	<div id="body">
		<div class="login_div1">
			<?= $flashdata ?>
			<!-- <form action="../controller/login.php" method="post"> -->
			<?php echo form_open(base_url() . 'login'); ?>
			<div class="login_div2">
				<input id="login_tb_username" class="login_tb" type="email" id="email" name="email" placeholder="email"
					autocomplete="off" value="<?= set_value('email'); ?>" maxlength="50" required>
				<input class="login_tb" type="password" id="password" name="password" placeholder="Password"
					autocomplete="off" required>
				<button class="login_btn btn btn-primary" type="submit" name="submit">Log In</button>
			</div>
			<?php echo form_close(); ?>
			<div class="login_div3">
				<hr>
				
				<!-- Button trigger register_modal -->
				<button id="register_btn" type="button" class="login_btn btn btn-success" data-bs-toggle="modal"
					data-bs-target="#register_modal">
					Create new account
				</button>

			</div>
		</div>
	</div>

	<p class="footer">
	</p>
</div>