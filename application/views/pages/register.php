<div id="register_modal_validation_errors">
    <?= validation_errors(); ?>
</div>
<?php echo form_open(base_url().'register'); ?>
<div class="register_div2">
    <div class="row">
        <div class="col">
            <input class="login_tb form-control" type="text" name="firstName" placeholder="First name"
                autocomplete="off" value="<?= set_value('firstName'); ?>" maxlength="30" required>
        </div>
        <div class="col">
            <input class="login_tb form-control" type="text" name="middleName" placeholder="Middle name" autocomplete="off"
                value="<?= set_value('middleName'); ?>" maxlength="30" required>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input class="login_tb form-control" type="text" name="lastName" placeholder="Last name" autocomplete="off"
                value="<?= set_value('lastName'); ?>" maxlength="30" required>
        </div>
    </div>

    <input class="login_tb" type="email" name="email" placeholder="email" autocomplete="off"
        value="<?= set_value('email'); ?>" maxlength="50" required>
    <input class="login_tb" type="number" name="number" placeholder="Mobile number" autocomplete="off"
        value="<?= set_value('number'); ?>" maxlength="30" required>
    <input class="login_tb" type="password" name="password" placeholder="Password" autocomplete="off"
        value="<?= set_value('password'); ?>" required>

    <input type="submit" name="submit" id="">
</div>
<?php echo form_close(); ?>