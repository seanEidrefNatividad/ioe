<div id="loginDiv">
	<div id="logoDiv" class="justify-content-start" >
		<img id="logo" src="<?= base_url(); ?>images/scentinelLogo.jpg" alt="Logo" style="margin: 0;"><span id="logoName">&nbsp;Scentinel</span>
	</div>
	<h2 id="loginHeader">Log in to your account</h2>
	<p id="registerLink">Don't have an account? <a href="<?= base_url() . 'index.php/register' ?>">Sign Up</a> </p>

	<div class="">
		<div style="width: 90%;">
			<?= $flashdata ?>
		</div>

		<?php echo form_open(base_url() . 'index.php/login'); ?>
		<div class="">
			<label class="lbl_login" for="email">Email Address</label>
			<input class="tb_login" type="email" id="email" name="email" autocomplete="off" value="<?= set_value('email'); ?>" maxlength="50" required>

			<label class="lbl_login" for="password">Password</label>
			<input class="tb_login" type="password" id="password" name="password"
				autocomplete="off" required>

			<button id="btn_login" class="btn btn-success" type="submit" name="submit">Log In</button>
		</div>
		<?php echo form_close(); ?>

	</div>
</div>

<p class="footer">
</p>
</div>

<div id="loginDiv2">
	<img id="loginBG" src="<?= base_url(); ?>images/bg.jpg" alt="bgimage">
</div>