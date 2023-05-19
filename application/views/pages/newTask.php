<script type="text/JavaScript"> 

let values = [1, 2, 3, 4];
let task = false;

        setInterval(function () {

            $.ajax({
                url: "<?=base_url().'index.php/api/newTask2'?>",
                method:'post',
                data:{},
                dataType:'json',
                success:function(data){
                    let value = JSON.parse(data);
                    values.push(value)
                },
                error:function(err){
                console.log(err)
                }
            });

            if (values.length > 5) {
                values.shift()
            }

            const average = values.reduce((a, b) => a + b, 0) / values.length;           

            if (average > 3) {
                if (!task) {
                    task = !task

                    $("body").append("<br>")
                    $("body").append("Average greater than 3. Creating new task")
                    $("body").append("<br>")
                    $("body").append("<br>")
                    $("body").append("NEW TASK - "+" average: " + average.toFixed(2) +" values: "+ values.toString())
                    $("body").append("<br>")
                } else {
                    $("body").append("<br>")
                    $("body").append("PENDING TASK - " +" average: " + average.toFixed(2) +" values: "+ values.toString())
                    $("body").append("<br>")
                    
                }
                
            } else {
                $("body").append("NO TASK - "+" average: " + average.toFixed(2) +" values: "+ values.toString())
                $("body").append("<br>")
            }
        }, 1000);


</script>