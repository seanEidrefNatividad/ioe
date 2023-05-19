<script type="text/JavaScript"> 

//let values = [1, 2, 3, 4];
let task = false;
// let status = "";
//let statusArray = ["Pending", "OnGoing", "Completed"];
// let snooze = 10000;
let snooze = 3000;

let marginOfError = 5;
let threshold = 4;
let intervals = 10;
let newValue = 0;
let values = [];
let counter = 0;
let once = false;

let status = "Completed";
let i = 0;

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}

        setInterval(function () {

            // $.ajax({
            //     url: "<?=base_url().'index.php/api/newTask2'?>",
            //     method:'post',
            //     data:{},
            //     dataType:'json',
            //     success:function(data){
            //         //status = data["Status"]
            //         //values.push(parseFloat(data["Sensor_Value"]))
            //         //newValue = parseFloat(data["Sensor_Value"])
            //     },
            //     error:function(err){
            //     console.log(err)
            //     }
            // });
            // $("body").append("<br> start </br>")

            newValue = getRandomInt(5 + 1);

            if (status == "Completed") {
                
                
                if(!once){
                    
                    setInterval(function () {
                        once = true;
                        
                    }, snooze)
                    $("body").append("<br>" + i)
                    i++;
                } else {
                    if (counter >= marginOfError) {
                        counter = 0;
                        values = [];
                        $("body").append("<br>")
                        $("body").append("Counter: "+ counter +" values: "+ values.toString())
                        $("body").append("<br>")
                    } else if (values.length < intervals){
                        if (newValue < threshold) {
                            counter++;
                            values.push(newValue);
                        } else {
                            values.push(newValue);
                        }
                        $("body").append("<br>")
                        $("body").append("Counter: "+ counter +" values: "+ values.toString())
                        $("body").append("<br>")
                    } else if (values.length >= intervals) {
                        $("body").append("<br>")
                        $("body").append("New task created, status pending")
                        $("body").append("<br>")
                        status = "Pending";
                    }
                }             
            } else {
                $("body").append("<br>")
                $("body").append("status pending")
            }

            // if (values.length > 5) {
            //     values.shift()
            // }

            // const average = values.reduce((a, b) => a + b, 0) / values.length;           

            // if (average > 3) {
            //     if (!task) {
            //         task = !task

            //         $("body").append("<br>")
            //         $("body").append("Average greater than 3. Creating new task")
            //         $("body").append("<br>")
            //         $("body").append("<br>")
            //         $("body").append("NEW TASK - "+" average: " + average.toFixed(2) +" values: "+ values.toString())
            //         $("body").append("<br>")
            //     } else {
            //         $("body").append("<br>")
            //         $("body").append("PENDING TASK - " +" average: " + average.toFixed(2) +" values: "+ values.toString())
            //         $("body").append("<br>")
                    
            //     }
                
            // } else {
            //     $("body").append("NO TASK - "+" average: " + average.toFixed(2) +" values: "+ values.toString())
            //     $("body").append("<br>")
            // }
        }, 1000);


</script>