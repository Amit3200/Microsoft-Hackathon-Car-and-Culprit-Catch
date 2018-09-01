<?php
include 'db.php';
session_start();
if(!$_SESSION['user'])
{
    header('location: Login.php');
}
else
{
    $k=$_SESSION['user'];
    $sql="select * from user where email='$k'";
    $sql2="select * from requestsf where name='$k'";
    $val=$db->query($sql);
    $valu=$db->query($sql2);
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Smart Act: Reports Reported
        </title>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                background: url("images/road3.jpg");
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
                height: 520px;
                
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
                        <center><h3 style="font-family: 'Quicksand', sans-serif;color:white;font-size: 18px;font-weight: bolder;">Summary</h3></center>
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
                                 <?php while($row1 = mysqli_fetch_array($valu)):?>
                                <tr>                           
                                <td>Request ID</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
    <td><?php echo $row1['rid']; ?></td>
                                </tr>
                                <tr>
                                    <td>Date of Lost</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row1['date']; ?></td>
                                </tr>
                                <tr>
                                    <td>Location of Lost</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row1['location']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['Status']; ?></td>
                                   
                                </tr>
                                 <?php endwhile ?>
                            </table>
                            <?php endwhile?>
                        </div><br>
                        <a href="Home.php" class="io res" style="padding:12px;">Home</a>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>