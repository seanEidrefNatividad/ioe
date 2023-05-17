<?= $headerNav ?>
<?= $sidebarNav ?>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

<div id="mainPage">
	<h1>Welcome to
		<?= $page ?>
	</h1>
	<div id="body">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	</div>

</div>
<script>
	window.onload = function () {

		var dataPoints = [];

		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "light2",
			title: {
				text: "Sensor Value"
			},
			axisX: {
				title: "Time"
			},
			axisY: {
				title: "PPM Levels"
			},
			data: [{
				type: "line",
				dataPoints: dataPoints
			}]
		});
		updateData();

		// Initial Values
		var xValue = 0;
		var yValue = 10;
		var newDataCount = 6;

		function addData(data) {
			if (newDataCount != 1) {
				$.each(data, function (key, value) {
					dataPoints.push({ x: value[0], y: parseInt(value[1]) });
					xValue++;
					yValue = parseInt(value[1]);
				});
			} else {
				//dataPoints.shift();
				dataPoints.push({ x: data[0][0], y: parseInt(data[0][1]) });
				xValue++;
				yValue = parseInt(data[0][1]);
			}

			newDataCount = 1;
			chart.render();
			setTimeout(updateData, 1500);
		}

		function updateData() {
			$.getJSON("https://canvasjs.com/services/data/datapoints.php?xstart=" + xValue + "&ystart=" + yValue + "&length=" + newDataCount + "type=json", addData);
		}

	}
</script>

<p class="footer">
</p>
</div>