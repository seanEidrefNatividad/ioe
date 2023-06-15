<?= $headerNav ?>
<?= $sidebarNav ?>

<div id="mainPage">
	<h1>Welcome to
		<?= $page ?>
	</h1>
	<div id="body">
		<?php if ($usertype == 1) { ?>
			<p style="height: 2rem;"><strong>User type:</strong>&emsp;End-user</p>
		<?php } else { ?>
			<p style="height: 2rem;"><strong>User type:</strong>&emsp;Admin</p>
		<?php } ?>
		<p style="height: 2rem;"><strong style="width: 100px">Name:</strong>&emsp;<span><?= $userData['First_Name']." ".$userData['Middle_Name']." ".$userData['Last_Name'] ?></span></p>
		<p style="height: 2rem;"><strong>Email Address:</strong>&emsp;<span><?= $userData['Email_Address'] ?></span></p>
		<p style="height: 2rem;"><strong>Contact Number:</strong>&emsp;<span><?= $userData['Contact_Number'] ?></span></p>
	</div>
</div>

<p class="footer">
</p>
</div>