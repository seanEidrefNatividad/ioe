<script type="text/JavaScript"> 

//let values = [1, 2, 3, 4];
let task = false;
// let status = "";
//let statusArray = ["Pending", "OnGoing", "Completed"];
// let snooze = 10000;
// let snooze = 3000;
let snooze = 3;
let id;
let marginOfError = 5;
let threshold = 3;
let intervals = 10;
let newValue = 0;
let values = [];
let counter = 0;
let once = false;

let building;
let floor;
let restroom;

//let status = "Completed";
let i = 1;

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}

function send_sms(){
    $.ajax({
        url: "<?=base_url().'index.php/api/send_sms'?>",
        method:'post',
        data:{
            message: 'A new task has been added. Please go to the S[c]entinel dashboard or refer to the link provided. Have a great day! https://stdominiccollege.edu.ph/scentinel/index.php/'
        },
        dataType:'json',
        success:function(data){
        },
        error:function(err){
        console.log(err)
        }
    });
}

        setInterval(function () {

            $.ajax({
                url: "<?=base_url().'index.php/api/newTask2'?>",
                method:'post',
                data:{},
                dataType:'json',
                success:function(data){
                    // console.log(data)
                    status = data["Status"]
                    //values.push(parseFloat(data["Sensor_Value"]))
                    id = data["ID"]
                    building = data["Building"]
                    floor = data["Floor"]
                    restroom = data["Restroom"]
                    newValue = parseFloat(data["Sensor_Value"])
                },
                error:function(err){
                console.log(err)
                }
            });
            // $("body").prepend("<br> start </br>")

            //newValue = getRandomInt(5 + 1);

            if (status == "Completed") {
                
                
                if(!once){
                    if (i >= snooze) {
                        once = true;                      
                    }
                    
                    // setInterval(function () {
                    //     once = true;
                        
                    // }, snooze)
                    $("body").prepend("<br>" + i + "<br>")
                    i++;
                } else {
                    if (counter >= marginOfError) {
                        counter = 0;
                        values = [];
                        $("body").prepend("<br>")
                        $("body").prepend("Counter: "+ counter +" values: "+ values.toString())
                        $("body").prepend("<br>")
                    } else if (values.length < intervals){
                        if (newValue < threshold) {
                            counter++;
                            values.push(newValue);      
                        console.log('di pa pending')     
                        } else {
                            values.push(newValue);
                        }
                        $("body").prepend("<br>")
                        $("body").prepend("Counter: "+ counter +" values: "+ values.toString())
                        $("body").prepend("<br>")
                    } else if (values.length >= intervals) {
                        // status = "Pending";
                        values = [];                           
                        console.log('pending na ulet')     
                        $("body").prepend("<br>")
                        $("body").prepend("New task created, status " + status)
                        $("body").prepend("<br>")     
                        
                        $.ajax({
                            url: "<?=base_url().'index.php/api/updateStatus'?>",
                            method:'post',
                            data:{
                                ID: id,
                                Status: 'Pending'
                            },
                            dataType:'json',
                            success:function(data){
                                $("body").prepend("<br>")
                                $("body").prepend("Status Updated to: " + status)
                                $("body").prepend("<br>")       
                                console.log('nag update')          
                                
                            },
                            error:function(err){
                                console.log(err)
                                $("body").prepend("<br>")
                                $("body").prepend("error: " + err)
                                $("body").prepend("<br>") 
                            }
                        });
                        $.ajax({
                            url: "<?=base_url().'index.php/api/createTask'?>",
                            method:'post',
                            data:{
                                Device_ID: id,                            
                                Building: building,
                                Floor: floor,
                                Restroom: restroom,
                                Status: 'Pending',
                                User_ID: 0
                            },
                            dataType:'json',
                            success:function(data){
                                $("body").prepend("<br>")
                                $("body").prepend("New task Created")
                                $("body").prepend("<br>")  
                                send_sms();
                            },
                            error:function(err){
                                console.log(err)
                                $("body").prepend("<br>")
                                $("body").prepend("error: " + err)
                                $("body").prepend("<br>") 
                            }
                        });
                    }
                }             
            } else {              
                once = false
                i = 1;
                counter = 0;
                $("body").prepend("<br>")
                $("body").prepend("status "+ status)
            }

            // if (values.length > 5) {
            //     values.shift()
            // }

            // const average = values.reduce((a, b) => a + b, 0) / values.length;           

            // if (average > 3) {
            //     if (!task) {
            //         task = !task

            //         $("body").prepend("<br>")
            //         $("body").prepend("Average greater than 3. Creating new task")
            //         $("body").prepend("<br>")
            //         $("body").prepend("<br>")
            //         $("body").prepend("NEW TASK - "+" average: " + average.toFixed(2) +" values: "+ values.toString())
            //         $("body").prepend("<br>")
            //     } else {
            //         $("body").prepend("<br>")
            //         $("body").prepend("PENDING TASK - " +" average: " + average.toFixed(2) +" values: "+ values.toString())
            //         $("body").prepend("<br>")
                    
            //     }
                
            // } else {
            //     $("body").prepend("NO TASK - "+" average: " + average.toFixed(2) +" values: "+ values.toString())
            //     $("body").prepend("<br>")
            // }
        }, 1000);


        

</script>