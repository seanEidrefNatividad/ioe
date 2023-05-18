<div id="sidebarNav">
    <ul>
        <li><a href="<?= base_url() . 'index.php/i/profile' ?>"><button class="btn_sidebarNav <?php if($page == "profile") echo "btn_active"; ?>">Profile</button></a></li>
        <?php if ($usertype == 1) { ?>
            <li><a href="<?= base_url() . 'index.php/i/task' ?>"><button class="btn_sidebarNav <?php if($page == "task") echo "btn_active"; ?>" >Task</button></a></li>
        <?php } else { ?>
            <li><a href="<?= base_url() . 'index.php/i/analytics' ?>"><button class="btn_sidebarNav <?php if($page == "analytics") echo "btn_active"; ?>">Analytics</button></a></li>
        <?php } ?>
    </ul>
</div>