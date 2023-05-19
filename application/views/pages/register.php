<div id="register_modal_validation_errors">
    <?= validation_errors(); ?>
</div>
<?php echo form_open(base_url() . 'index.php/register'); ?>
<div id="registerDiv">
    <div id="logoDiv" class="justify-content-start" >
		<img id="logo" src="<?= base_url(); ?>images/scentinelLogo.jpg" alt="Logo" style="margin: 0;"><span id="logoName">&nbsp;Scentinel</span>
	</div>
	<h2 id="loginHeader">Create your account</h2>
	<p id="registerLink">Have an account? <a href="<?= base_url() . 'index.php/login' ?>">Login in now</a> </p>


    <label class="lbl_register" for="email">First name</label>
    <input class="tb_register" type="text" name="firstName" autocomplete="off" value="<?= set_value('firstName'); ?>" maxlength="30" required>

    <label class="lbl_register" for="email">Middle name</label>
    <input class="tb_register" type="text" name="middleName" autocomplete="off" value="<?= set_value('middleName'); ?>" maxlength="30" required>

    <label class="lbl_register" for="email">Last name</label>
    <input class="tb_register" type="text" name="lastName" autocomplete="off" value="<?= set_value('lastName'); ?>" maxlength="30" required>

    <label class="lbl_register" for="email">Email Address</label>
    <input class="tb_register" type="email" name="email" autocomplete="off" value="<?= set_value('email'); ?>" maxlength="50" required>

    <label class="lbl_register" for="email">Mobile Number</label>
    <input class="tb_register" type="number" name="number" autocomplete="off" value="<?= set_value('number'); ?>" maxlength="30" required>

    <label class="lbl_register" for="email">Password</label>
    <input class="tb_register" type="password" name="password" autocomplete="off" value="<?= set_value('password'); ?>" required>

    <input id="btn_register" type="submit" name="submit" id="">
</div>
<?php echo form_close(); ?>

<div id="registerDiv2">
    <img id="loginBG" src="<?= base_url(); ?>images/bg.jpg" alt="bgimage">
</div>