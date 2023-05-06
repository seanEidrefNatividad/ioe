<?php if ($this->session->flashdata('registered')): ?>
    <?= '<div class="alert alert-success">' . $this->session->flashdata('registered') . '</div>' ?>
<?php endif; ?>
<?php if ($this->session->flashdata('WrongLogIn')): ?>
    <?= '<div class="alert alert-danger">' . $this->session->flashdata('WrongLogIn') . '</div>' ?>
<?php endif; ?>