<?= $headerNav ?>
<?= $sidebarNav ?>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.css">
<script src="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.js"></script>

<div id="mainPage">
	<h1>Welcome to
		<?= $page ?>
	</h1>
	<div id="body">
		<div id="chartContainerBar" style="height: 370px; width: 100%;"></div>
	</div>

</div>
<script>
	$('body').waitMe({
		effect: 'win8',
		text: 'This may take a while due to heavy data processing...',
		bg: 'rgba(255,255,255,0.7)',
		color: '#cc0000',
		maxSize: '',
		waitTime: -1,
		textPos: 'vertical',
		fontSize: '',
		source: '',
		onClose: function () {

		}
	});
	class AnalyticsTask {
		constructor() {
			this.Task_Complete = []

			this.Ben = []
			this.Sean = []
			this.Jubs = []
			this.Niel = []
			this.Adam = []

			// this.BSIT_gwa = [];
		}
		async getChartDataTask(id) {
			return new Promise((resolve, reject) => {
				$.ajax({
					url: "<?= base_url('index.php/Task/getChartDataTask') ?>",
					method: "post",
					data: {
						task_ID: id
						// schoolyear: schoolyear
						// semester: semester
					},
					dataType: 'json',
					success: function ($id) {
						resolve($id);
					},
					error: function ($err) {

					}

				})
			}).then(data => data);
		}
		async renderData() {
			// (async()=>{
			var ben_data = await this.getChartDataTask(6);
			var sean_data = await this.getChartDataTask(4);
			var adam_data = await this.getChartDataTask(7);
			var niel_data = await this.getChartDataTask(9);
			var jubs_data = await this.getChartDataTask(8);


			this.Ben = ben_data.map(data => {
				return { label: data.Full_Name, y: parseInt(data.Completed)  };
			});
			this.Sean = sean_data.map(data => {
				return { label: data.Full_Name, y: parseInt(data.Completed)  };
			});
			this.Adam = adam_data.map(data => {
				return { label: data.Full_Name, y: parseInt(data.Completed)  };
			});
			this.Niel = niel_data.map(data => {
				return { label: data.Full_Name, y: parseInt(data.Completed)  };
			});
			this.Jubs = jubs_data.map(data => {
				return { label: data.Full_Name, y: parseInt(data.Completed)  };
			});
		}
		async renderTask() {
			var this_val = this;
			$.each(this.Ben, function (index, value) {
				this_val.Task_Complete.push(value)
			})
			$.each(this.Sean, function (index, value) {
				this_val.Task_Complete.push(value)
			})
			$.each(this.Adam, function (index, value) {
				this_val.Task_Complete.push(value)
			})
			$.each(this.Niel, function (index, value) {
				this_val.Task_Complete.push(value)
			})
			$.each(this.Jubs, function (index, value) {
				this_val.Task_Complete.push(value)
			})
		}
		async renderGraph() {
			await this.renderData();
			await this.renderTask();

			console.log(this.Task_Complete);

			this.container = [];
			this.container = JSON.stringify(this.Task_Complete);
			// console.log(this.firstYear)

			var chart = new CanvasJS.Chart("chartContainerBar", {
				animationEnabled: true,
				exportEnabled: true,
				maintainAspectRatio: true,
				theme: "light1", // "light1", "light2", "dark1", "dark2"
				title: {
					text: "Task Distribution"
				},
				axisY: {
					title: "Task Completed",
					suffix: "",
					includeZero: true,
				},
				axisX: {
					title: "Name",
					suffix: "",
					// minimum: 0,
					// maximum: 17
					interval: 1
				},
				legend: {
					cursor: "pointer",
					itemclick: this.toggleDataSeries
				},
				data: [{
					type: "column", //change type to bar, line, area, pie, etc
					indexLabel: "{y}",
					yValueFormatString: "#,##0.##",
					name: "All Task",
					dataPoints: this.Task_Complete,
				}]
			});
			setTimeout(() => {
				chart.render();
			}, 900);
		}
	}

	var AnalyticsChart = new AnalyticsTask();

	window.onload = async function () {
		await AnalyticsChart.renderGraph();
		$('body').waitMe('hide');


		// AnalyticsClass.renderData();
		// var SchoolYear =['schoolyear'];
		// var total =['Total'];
	}
</script>

<p class="footer">
</p>
</div>