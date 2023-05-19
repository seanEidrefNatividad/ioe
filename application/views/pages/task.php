<?= $headerNav ?>
<?= $sidebarNav ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
	#btn_completed:hover {
		cursor: default;
	}
</style>
<div id="mainPage" style="border: 0!important">
	<h1>Cleaning
		<?= $page ?>
	</h1>
	<div id="body">
	</div>

	<div class="w3-container">


		<button onclick="myFunction('Demo1')" class="w3-btn w3-block w3-blue w3-left-align">Pending Tasks</button>
		<div id="Demo1" class="w3-container w3-hide">
			<!-- <div id="taskDiv1">
				<button id="1" class="btn_visibility testing1 w3-btn w3-block w3-black w3-left-align">Task #</button>
				<div id="PendingTask1" class=" w3-container" style="display: none">
					<h4 style="text-align: center;">Task 1</h4>
					<p>Bldg: </p>
					<p>Floor: </p>
					<p>Restroom: </p>
					<div class="actions_group" style="text-align: center;">
						<h5>Accept Task?</h5>
						<button id="1" class="btn_action">Accept</button>
					</div>
					<br>
				</div>
			</div> -->
			<!-- <button onclick="myFunction('PendingTask2')" class="w3-btn w3-block w3-black w3-left-align">Task#</button>
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
			</div> -->

		</div>
	</div>

	<div class="w3-container">

		<button onclick="myFunction('Demo2')" class="w3-btn w3-block w3-yellow w3-left-align">On-going Tasks</button>
		<div id="Demo2" class="w3-container w3-hide">
			<!-- <div id="taskDiv2">
			<button onclick="myFunction('onGoingTask2')" class="w3-btn w3-block w3-black w3-left-align">Task #</button>
			<div id="onGoingTask2" class="w3-container w3-hide">
				<h4 style="text-align: center;">Task 2</h4>
				<p>Bldg: </p>
				<p>Floor: </p>
				<p>Restroom: </p>
				<br>
				<div style="text-align: center;">
					<button id="2" class="btn_action" style="width: 30%;">Complete</button>
					<button id="canc" style="width: 30%;">Cancel</button>
				</div>
				<br>
			</div>
		</div> -->

		</div>
	</div>

	<div class="w3-container">

		<button onclick="myFunction('Demo3')" class="w3-btn w3-block w3-green w3-left-align">Completed Tasks</button>
		<div id="Demo3" class="w3-container w3-hide">
			<!-- <button onclick="myFunction('CompletedTask1')" class="w3-btn w3-block w3-black w3-left-align">Task
				#</button>
			<div id="CompletedTask1" class="w3-container w3-hide">
				<h4 style="text-align: center;">Task 1</h4>
				<p>Bldg: </p>
				<p>Floor: </p>
				<p>Restroom: </p>
				<div style="text-align: center;">
					<button style="width: 30%;" style="cursor: default;">Status: Completed</button>
				</div>
			</div> -->

		</div>
	</div>
</div>


<p class="footer">
</p>
</div>



<script>
	$(document).ready(function () {
		myProfile()
		 
		get_pending_tasks()

		get_ongoing_tasks()

		get_completed_tasks()
	})

	var global_full_name = '';

	function myFunction(id) {
		var x = document.getElementById(id);
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else {
			x.className = x.className.replace(" w3-show", "");
		}
	}

	function myProfile() {
		$.ajax({
			url: '<?=base_url('index.php/Task/getProfile')?>',
			dataType: 'json',
			success: function(data) {
				global_full_name = data['Full_Name']
			},
			error: function(err) {
				console.log(err)
			}
		})
	}

	function get_pending_tasks() {
		$.ajax({
			url: '<?= base_url('index.php/Task/pendingTask') ?>',
			dataType: 'json',
			success: function (data) {
				
				
				for (var i = 0; i < data.length; i++) {
					var html = '';
					html +=
						`<div id="taskDiv${data[i].task_ID}">` +
							`<button id="${data[i].task_ID}" class="btn_visibility w3-btn w3-block w3-black w3-left-align">Task ${data[i].task_ID}</button>` +
								`<div id="PendingTask${data[i].task_ID}" class=" w3-container" style="display: none">` +
								`<h4 style="text-align: center;">Task ${data[i].task_ID}</h4>` +
								`<p>Bldg: ${data[i].Building} </p>` +
								`<p>Floor: ${data[i].Floor}</p>` +
								`<p>Restroom: ${data[i].Restroom}</p>` +
								`<p class="p_cleaner"></p>` +
								`<div class="actions_group" style="text-align: center;">` +
								`<h5>Accept Task?</h5>` +
								`<button id="${data[i].task_ID}" class="btn_action">Accept</button>` +
								`</div>` +
							`<br>` +
							`</div>` +
						`</div>`
						$('#Demo1').append(html)
				}
			},
			error: function (err) {
				console.log(err)
			}
		})
	}
	function get_ongoing_tasks() {
		$.ajax({
			url: '<?= base_url('index.php/Task/onGoingTask') ?>',
			dataType: 'json',
			success: function (data) {

				
				for (var i = 0; i < data.length; i++) {
					var html = '';
					html +=
					`<div id="taskDiv${data[i].task_ID}">`+
						`<button id="${data[i].task_ID}" class="btn_visibility w3-btn w3-block w3-black w3-left-align">Task ${data[i].task_ID}</button>`+
						`<div id="onGoingTask${data[i].task_ID}" class="w3-container" style="display: none">`+
							`<h4 style="text-align: center;">Task ${data[i].task_ID}</h4>`+
							`<p>Bldg: ${data[i].Building} </p>` +
							`<p>Floor: ${data[i].Floor}</p>` +
							`<p>Restroom: ${data[i].Restroom}</p>` +
							`<p class="p_cleaner">Cleaner: ${data[i].Full_Name}</p>` +
							`<br>`+
							`<div style="text-align: center;">`+
								`<button id="${data[i].task_ID}" class="btn_action" style="width: 30%;">Complete</button>`+
								`<button id="${data[i].task_ID}" class="btn_cancel" style="width: 30%;">Cancel</button>`+
							`</div>`+
							`<br>`+
						`</div>`+
					`</div>`
					$('#Demo2').append(html)
						
	
				}
			},
			error: function (err) {
				console.log(err)
			}
		})
	}

	function get_completed_tasks() {
		$.ajax({
			url: '<?= base_url('index.php/Task/completedTask') ?>',
			dataType: 'json',
			success: function (data) {
				
				for (var i = 0; i < data.length; i++) {
					var html = '';
					html +=
					`<button id="${data[i].task_ID}" class="btn_visibility w3-btn w3-block w3-black w3-left-align">Task ${data[i].task_ID}</button>`+
					`<div id="CompletedTask${data[i].task_ID}" class="w3-container" style="display: none">`+
						`<h4 style="text-align: center;">Task ${data[i].task_ID}</h4>`+
						`<p>Bldg: ${data[i].Building} </p>` +
						`<p>Floor: ${data[i].Floor}</p>` +
						`<p>Restroom: ${data[i].Restroom}</p>` +
						`<p class="p_cleaner">Completed by: ${data[i].Full_Name}</p>` +
						`<div style="text-align: center;">`+
							`<button id="btn_completed" style="width: 30%;" style="cursor: default;">Status: Completed</button>`+
						`</div>`+
					`</div>`
				$('#Demo3').append(html)
				}
			},
			error: function (err) {
				console.log(err)
			}
		
		})
	}


	$(document).on('click', '.btn_visibility',function () {
		$(this).next('div').slideToggle()
	})

	// $('.btn_action').on('click', '.btn_action', function () {
	$(document).on('click', '.btn_action', function () {
		console.log('asd')

		var html_ongoing =
			'<br>' +
			'<div style="text-align: center;">' +
			`<button id="${this.id}" class="btn_action" style="width: 30%;">Complete</button>` +
			`<button id="${this.id}" class="btn_cancel" style="width: 30%;">Cancel</button>` +
			'</div>';

		var html_completed =
			'<div style="text-align: center;">' +
			'<button id="btn_completed" style="width: 30%;">Status: Completed</button>' +
			'</div>';

		var html_cleaner =
			'<p class="p_cleaner"> Cleaner: ' + global_full_name + '</p>'

		var html_completed_by = 
			'<p class="p_cleaner"> Completed by: ' + global_full_name + '</p>'

		console.log($(this).attr('id'))

		// from pending to ongoing
		if (($(this).closest('#taskDiv' + $(this).attr('id')).children('div').attr('id')) == `PendingTask${this.id}`) {
			console.log('pending task accepted')

			$(this).parent().siblings('.p_cleaner').html(html_cleaner)

			$('#Demo2').append($(this).closest('#taskDiv' + $(this).attr('id')))
			$(this).closest('#PendingTask' + $(this).attr('id')).attr('id', 'onGoingTask' + $(this).attr('id'))
			$(this).closest('div').replaceWith(html_ongoing)

			accept_pending_task($(this).attr('id'));
		}

		// from ongoing to completed
		if (($(this).closest('#taskDiv' + $(this).attr('id')).children('div').attr('id')) == `onGoingTask${this.id}`) {

			console.log('ongoing task')

			$(this).parent().siblings('.p_cleaner').html(html_completed_by)

			$('#Demo3').append($(this).closest('#taskDiv' + $(this).attr('id')))
			$(this).closest('#onGoingTask' + $(this).attr('id')).attr('id', 'CompletedTask' + $(this).attr('id'))

			// console.log($(this).parent().siblings('.p_cleaner').html())


			// $(this).closest('.btn_visibility').attr('onclick',`myFunction(onGoingTask${this.id})`)
			$(this).closest('.btn_visibility').remove()
			$(this).prepend(`<button id="${this.id}" onclick="myFunction('onGoingTask${this.id}')" class="w3-btn w3-block w3-black w3-left-align">Task ${this.id}</button>`)

			$(this).closest('div').replaceWith(html_completed)
			
			
			complete_task($(this).attr('id'));
		}

		// add if for parent id to differentiate
	})

	$(document).on('click', '.btn_cancel', function () {
		var html_pending =
			'<div class="actions_group" style="text-align: center;">' +
			'<h5>Accept Task?</h5>' +
			`<button id="${this.id}" class="btn_action">Accept</button>` +
			'</div>'

		console.log('cancelled task')
		$(this).parent().siblings('.p_cleaner').text('');
		$('#Demo1').append($(this).closest('#taskDiv' + $(this).attr('id')))
		$(this).closest('#onGoingTask' + $(this).attr('id')).attr('id', 'PendingTask' + $(this).attr('id'))

		cancel_ongoing_task($(this).attr('id'));

		$(this).closest('div').replaceWith(html_pending)
	})

	function accept_pending_task($task_ID) {
		$.ajax({
			url: '<?= base_url('index.php/Task/acceptPT') ?>',
			data: {
				id:$task_ID
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				console.log('Success')
			},
			error: function (err) {
				console.log(err)
			}
		})
	}

	function cancel_ongoing_task($task_ID) {
		$.ajax({
			url: '<?= base_url('index.php/Task/cancelOT') ?>',
			data: {
				id:$task_ID,
				User_ID: '0',
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				console.log('Success')
			},
			error: function (err) {
				console.log(err)
			}
		})
	}

	function complete_task($task_ID) {
		$.ajax({
			url: '<?= base_url('index.php/Task/completeOT') ?>',
			data: {
				id:$task_ID,
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				console.log('Success')
			},
			error: function (err) {
				console.log(err)
			}
		})
	}
</script>