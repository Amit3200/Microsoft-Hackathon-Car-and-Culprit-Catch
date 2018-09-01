<?php 
include 'db.php';
session_start();
if(isset($_POST['send']))
{
$email=$_POST['user'];
$pass=$_POST['pass'];
    $sql="select email,vehicle from user where email='$email' and vehicle='$pass'";
$val=$db->query($sql);
if($total = $db->query($sql))
{
$total1=mysqli_num_rows($total);
if($total1==1)
{
    $_SESSION['user']=$email;
    header('location: Home.php');
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
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Smart Act:Login
        </title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
            body
            {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                background: url("images/road3.jpg");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
            .in
            {
                width: 250px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border:1px solid #000;
            }
            .io
            {
                width:250px;
                height: 34px;
                outline: 0;
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                background: #66b30a;
                border:0px;
            }
            .in:focus
            {
                border-color: #3498db;
            }
            .subdivision
            {
                margin-top: 180px;
                background: rgba(0,0,0,0.7);
                width: 400px;
                height: 300px;
            }
            .pics
            {
                margin-top: -100px;
            }
            @media screen and (max-width: 769px) {
            .subdivision
                {
                    width: auto;
                }
                .in .io
                {
                    width:auto;
                }
}
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form method="post">
                <center>
                <div class="subdivision"><br>
                    <img src="images/avatar1.png" width="120px" class="pics">
                    <h2 style="font-family:'Quicksand',sans-serif; font-size:22px;font-weight: bolder;color:white;">Login to Smart Found</h2><br>
                    <input type="text" placeholder="email" required name="user" class="in"><br><br>
                    <input type="password" placeholder="vehicle" required name="pass" class="in"><br><br>
                    <button type="submit" class="io" name="send">Login</button><br>&nbsp;<!--Change Type-->
                    <a href="Signup.php" style="cursor: pointer;"><p style="font-family:'Quicksand',sans-serif; font-size:14px;font-weight: bolder; color:dodgerblue;">Don't have an account Signup here</p></a><br>
                </div>
                </center>
            </form>
        </div>
    </body>
</html>