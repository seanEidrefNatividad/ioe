<?= $headerNav ?>
<?= $sidebarNav ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div id="mainPage">
	<h1>Cleaning
		<?= $page ?>
	</h1>
	<div id="body">
	</div>

	<div class="w3-container">

		<button onclick="myFunction('Demo1')" class="w3-btn w3-block w3-blue w3-left-align">Pending Tasks</button>
		<div id="Demo1" class="w3-container w3-hide">
			<button onclick="myFunction('PendingTask1')" class="w3-btn w3-block w3-black w3-left-align">Task #</button>
			<div id="PendingTask1" class="w3-container w3-hide">
				<h4 style="text-align: center;">Task 1</h4>
				<p>Bldg: </p>
				<p>Floor: </p>
				<p>Restroom: </p>
				<div style="text-align: center;">
					<h5>Accept Task?</h5>
					<button>Accept</button>
				</div>
				<br>
			</div>
			<button onclick="myFunction('PendingTask2')" class="w3-btn w3-block w3-black w3-left-align">Task #</button>
			<div id="PendingTask2" class="w3-container w3-hide">
				<h4 style="text-align: center;">Task 1</h4>
				<p>Bldg: </p>
				<p>Floor: </p>
				<p>Restroom: </p>
				<div style="text-align: center;">
					<h5>Accept Task?</h5>
					<button>Accept</button>
				</div>
				<br>
			</div>

		</div>
	</div>

	<div class="w3-container">

		<button onclick="myFunction('Demo2')" class="w3-btn w3-block w3-yellow w3-left-align">On-going Tasks</button>
		<div id="Demo2" class="w3-container w3-hide">
			<button onclick="myFunction('OnGoingTask1')" class="w3-btn w3-block w3-black w3-left-align">Task #</button>
			<div id="OnGoingTask1" class="w3-container w3-hide">
				<h4 style="text-align: center;">Task 1</h4>
				<p>Bldg: </p>
				<p>Floor: </p>
				<p>Restroom: </p>
				<br>
				<div style="text-align: center;">
					<button style="width: 30%;">Complete</button>
					<button style="width: 30%;">Cancel</button>
				</div>
				<br>
			</div>

		</div>
	</div>

	<div class="w3-container">

		<button onclick="myFunction('Demo3')" class="w3-btn w3-block w3-green w3-left-align">Completed Tasks</button>
		<div id="Demo3" class="w3-container w3-hide">
			<button onclick="myFunction('CompletedTask1')" class="w3-btn w3-block w3-black w3-left-align">Task #</button>
			<div id="CompletedTask1" class="w3-container w3-hide">
				<h4 style="text-align: center;">Task 1</h4>
				<p>Bldg: </p>
				<p>Floor: </p>
				<p>Restroom: </p>
				<div style="text-align: center;">
					<button style="width: 30%;">Status: Completed</button>
				</div>
			</div>

		</div>

	</div>
</div>


<p class="footer">
</p>
</div>

<script>
	function myFunction(id) {
		var x = document.getElementById(id);
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else {
			x.className = x.className.replace(" w3-show", "");
		}
	}
</script>