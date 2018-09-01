<?php
include 'db.php';
include('phpqrcode/qrlib.php'); 
session_start();
$rope=0;
if(!$_SESSION['user'])
{
    header('location: Login.php');
}
else
{
    
    $k=$_SESSION['user'];
    $sql="select * from user where email='$k'";
    $val=$db->query($sql);
    while($row = mysqli_fetch_array($val))
    {
        $rope=$row['vehicle'];
    }
    if(isset($_POST['send']))
    {
        $name=$_POST['name1'];
        $card=$_POST['card'];
        $loc=$_POST['loc'];
        $cvv=$_POST['cvv'];
        $exp=$_POST['exp'];
        $bal=$_POST['bal'];
        $sql2="select * from fakecard where card='$card' and cvv='$cvv' and exp='$exp'";
        $val1=$db->query($sql2);
        $text1='';
        $folder="images/";
        if($total = $db->query($sql2))
        {
            //echo "<script>alert('work')</script>";
            $total1=mysqli_num_rows($total);
            if($total1==1)
            {
            $sql3="insert into pays(balance,location,vehicle) values('$bal','$loc','$rope')";
            //    echo $sql3;
            $val341=$db->query($sql3);
                if($val341==true)
                {
                    echo "<script>alert('Added');</script>";
                }
                else
                {
                     echo "<script>alert('Failure');</script>"; 
                }
            $sql4="select * from pays ORDER BY tid desc";
            $val34=$db->query($sql4);
            //echo $sql4;
            $unique=0;
            while($rowk = mysqli_fetch_array($val34))
            {
            $unique=$rowk['tid'];
            //echo $rowk['tid'];
            //echo "work";
            break;
            }
            $file_name=$unique.".png";
            $text=(string)$bal."\n";
            $text.=(string)$rope."\n";
            $text.=(string)$loc."\n";
            $text.=(string)$unique."\n";
            $file_name=$folder.$file_name;
            QRcode::png($text,$file_name);
            header("location: Show.php?name='$unique'");
            }
            else
            {
                echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
                </script>';
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Invalid Credentials!","Record Not Found!","warning");';
                echo '}, 100);</script>';
            }
        }
                    else
{

echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Invalid Credentials!","Record Not Found!","warning");';
  echo '}, 100);</script>';
}
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Smart Act:Wallet
        </title>
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
                margin-top: 100px;
                background: rgba(0, 0, 0, 0.7);
                width: 400px;
                height: 450px;
            }

            .pics {
                margin-top: -100px;
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
                        <img src="images/avatar1.png" width="120px" class="pics" align="left">
                        <h2 style="font-family:'Quicksand',sans-serif; font-size:22px;font-weight: bolder;color:white;">Smart Found</h2>
                        <h3 style="font-family: 'Quicksand', sans-serif;color:white;font-size: 18px;font-weight: bolder;">Enter Balance to Add : <input type="text" placeholder="Enter Balance $" style="background: none;border: none;border-bottom:2px solid black;color:white;" class="in3" name="bal"></h3>
                        <br>
                        <h3 style="font-family: 'Quicksand', sans-serif;color:white;font-size: 18px;font-weight: bolder;margin-top:-20px;"> <input type="text" placeholder="Enter Toll Tax Name" style="background: none;border: none;border-bottom:2px solid black;color:white;width:300px;" class="in3" name="loc"></h3>
                        <div>
                            <?php while($row = mysqli_fetch_array($val)):?>
                            <table class="cold">
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
                            </table>
                            <?php endwhile ?>
                        </div>
                        <br>
                        <input type="number" class="in res" style="width: 300px;" placeholder="Enter Credit/Debit Card No." name="card">
                        <br><br>
                        <input type="text" class="in2 res" res placeholder="Enter Card Holder Name" style="width: 300px;" name="name1">&nbsp;<br><br>
                        <input type="password" class="in2 res"  placeholder="Enter CVV" maxlength="3" required style="width:150px;" name="cvv">
                        <input type="text" class="in2 res"  placeholder="MM/YY Expiry Date" maxlength="5" required style="width:150px;" name="exp">
                        <br><br>
                        <button class="io res" name="send">Pay Now</button>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>