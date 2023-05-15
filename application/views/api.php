
    
<h1>Hello api!</h1>

<span id="sensorVal">123</span>

<script>

$(document).ready(function(){

    set_sensor();
// setInterval(() => {
// }, 5000);    

})

function set_sensor()
{
    $('#sensorVal').empty()
    $.ajax({
        // url: 'http://jsonplaceholder.typicode.com/posts',
        // url: 'localhost/192.168.1.18',
        url: '<?=base_url();?>index.php/Api/get_sensor_val',
        method: 'post',
        // data: {data:"check"},
        dataType: 'json',
        success: function(data){
            // $('#sensorVal').text('');
            // $('#sensorVal').text(data)
            $('#sensorVal').text(data);
            console.log(data)
        },
        error: function(err){
            console.log(err)
        }
    });
}




</script>