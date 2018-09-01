<?php
include 'db.php';
session_start();
$rope=0;
ini_set('max_execution_time', 0);
if(!$_SESSION['user'])
{
    header('location: Login.php');
}
else
{

    $k=$_SESSION['user'];
    $sql="select * from user where email='$k'";
    $val=$db->query($sql);
    if(isset($_POST['send']))
    {
        $request=$_POST['details'];
        $loc=$_POST['location'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        while($row = mysqli_fetch_array($val))
        {
        $v=$row['vehicle'];
        }
        //echo $v;
        $sql2="INSERT INTO requestsf(vehicle,name,date, time, location, details) VALUES ('$v','$k','$date','$time','$loc','$request');";
        $valu=$db->query($sql2);
        echo "<script>alert('REQUEST SUBMITTING MAY TAKE TIME AND SCANNING HAS STARTED');</script>";
        $kr=shell_exec("python3 DetectNumberPlate.py $v $loc");
        //echo $kr;  
        echo "<script>alert('Request is Submitted and QR Generation is Blocked for Now')</script>";
        if($valu==true)
        {
echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Requests","Request Submitted","success");';
  echo '}, 100);</script>';
        sleep(1);
        $rope=1;
        }
        
    }
}
if(isset($_POST['kpo']))
{
    header("location: Reportsf.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>
            Smart Act:Report
        </title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function kpo1()
            {
                window.location.assign("Home.php");
            }
        </script>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .in {
                width: 150px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border: 2px solid #000;
            }
            .in2{
                width: 150px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border: 2px solid #000;
            }
            .in3
            {
                width: 114px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border: 2px solid #000;
            }


            .io {
                width: 250px;
                height: 34px;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                background: #66b30a;
                border: 0px;
            }

            .in:focus {
                border-color: #3498db;
            }

            .subdivision {
                margin-top: 40px;
                background: rgba(0, 0, 0, 0.7);
                width: 400px;
                height: 600px;
                
            }

            .pics {
                margin-top: -40px;
                margin-left: -480px;
            }

            @media screen and (max-width: 769px) {
                .subdivision {
                    width: auto;
                }
                .in .io {
                    width: auto;
                }
                .inside {
                    background: #f1c40f;
                    width: 200px;
                    height: 30px;
                    opacity: 0.7;

                }
                .content {
                    font-family: "Quicksand", sans-serif;
                    font-weight: bolder;
                    font-size: 14px;
                    margin-top: -10px;
                    border: 1px solid white;
                }
                .content:hover {
                    font-family: "Quicksand", sans-serif;
                    font-weight: bolder;
                    font-size: 14px;
                    margin-top: -10px;
                    border: 1px solid #3498db;
                }
                .serv {
                    text-decoration: none;
                    color: black;
                    cursor: pointer;
                    border: 1px solid black;
                }
                .serv:hover {
                    text-decoration: none;
                    color: white;
                }
                .cold {
                    font-family: "Quicksand", sans-serif;
                    font-weight: bolder;
                    font-size: 14px;
                    margin-top: -10px;
                    line-height: 2;
                    color: white;
                }
            }

            .content {
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border: 1px solid white;
            }

            .content:hover {
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border: 1px solid #3498db;
            }

            .serv {
                text-decoration: none;
                color: black;
                cursor: pointer;
                border: 1px solid black;
            }

            .serv:hover {
                text-decoration: none;
                color: white;
            }

            .cold {
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                line-height: 2;
                color: white;
            }

            .inside {
                background: #f1c40f;
                width: 200px;
                height: 30px;
                opacity: 0.7;

            }

            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            input[type=date]::-webkit-inner-spin-button,
            input[type=date]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            .io:hover
            {
                color:white;
            }
                  @media screen and (min-width: 769px) {
            .res
            {
                width:auto;
            }
            }
            .res:focus
            {
                border:1px solid #3498db;
            }
                        
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <form method="post">
                <center>
                    <div class="subdivision"><br>
                        <div style="margin-right:-100px;"> <img src="images/avatar1.png" width="120px" class="pics" ></div>
                        <center><h2 style="font-family:'Quicksand',sans-serif; font-size:22px;font-weight: bolder;color:white;margin-top:-60px;">Smart Found</h2></center>
                        <center><h3 style="font-family: 'Quicksand', sans-serif;color:white;font-size: 18px;font-weight: bolder;">Report Here</h3></center>
                        <br>
                        <div>
                            <table class="cold">
                        <?php while($row = mysqli_fetch_array($val)):?>
                                <tr>
                                    <th colspan="3"></th>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['firstname']?>&nbsp;<?php echo $row['lastname']?></td>
                                </tr>
                                <tr>
                                    <td>Vehicle</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['vehicle']?></td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                        <br>
                        <input type="text" class="in2 res" style="width: 300px;" placeholder='Location' name="location">&nbsp;<br><br>
                        <select class="in2 res" style="width:300px;" name="time">
                            <option text>Choose Slot</option>
                            <option name="00:00-01:00">00:00-01:00</option>
                            <option name="01:00-02:00">01:00-02:00</option>
                            <option name="02:00-03:00">02:00-03:00</option>
                            <option name="03:00-04:00">03:00-04:00</option>
                            <option name="04:00-05:00">04:00-05:00</option>
                            <option name="05:00-06:00">05:00-06:00</option>
                            <option name="06:00-07:00">06:00-07:00</option>
                            <option name="07:00-08:00">07:00-08:00</option>
                            <option name="08:00-09:00">08:00-09:00</option>
                            <option name="09:00-10:00">09:00-10:00</option>
                            <option name="10:00-11:00">10:00-11:00</option>
                            <option name="11:00-12:00">11:00-12:00</option>
                            <option name="12:00-13:00">12:00-13:00</option>
                            <option name="13:00-14:00">13:00-14:00</option>
                            <option name="14:00-15:00">14:00-15:00</option>
                            <option name="15:00-16:00">15:00-16:00</option>
                            <option name="16:00-17:00">16:00-17:00</option>
                            <option name="17:00-18:00">17:00-18:00</option>
                            <option name="18:00-19:00">18:00-19:00</option>
                            <option name="19:00-20:00">19:00-20:00</option>
                            <option name="20:00-21:00">20:00-21:00</option>
                            <option name="21:00-22:00">21:00-22:00</option>
                            <option name="22:00-23:00">22:00-23:00</option>
                            <option name="23:00-24:00">23:00-24:00</option>
                        </select><br><br>
                        <input type="date" class="in2 res" style="width: 300px;" name="date">&nbsp;<br><br>
                        <textarea class="in res" style="width: 300px;height:100px;resize:none;" placeholder="Enter Details" name="details"></textarea>
                        <br>
                        <button type="submit" class="io res" name="send">Submit Now</button><br><br>
                        <button type="submit" class="io res" name="kpo">Reports</button><br>
                         <a href="Home.php" class="io res" style="padding:12px;">Home</a>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>