<div id="sidebarNav">
    <ul>
        <li><button><a href="<?= base_url() . 'index.php/i/profile' ?>">Profile</a></button></li>
        <?php if ($usertype == 1) { ?>
            <li><button><a href="<?= base_url() . 'index.php/i/task' ?>">Task</a></button> </li>
        <?php } else { ?>
            <li><button><a href="<?= base_url() . 'index.php/i/analytics' ?>">Analytics</a></button> </li>
        <?php } ?>
    </ul>
</div>