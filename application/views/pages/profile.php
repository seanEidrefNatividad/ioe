<?= $headerNav ?>
<?= $sidebarNav ?>

<div id="mainPage">
	<h1>Welcome to
		<?= $page ?>
	</h1>
	<div id="body">
		<?php if ($usertype == 1) { ?>
			<span>User type: End-user</span>
		<?php } else { ?>
			<span>User type: Admin</span>
		<?php } ?>
	</div>
</div>

<p class="footer">
</p>
</div>