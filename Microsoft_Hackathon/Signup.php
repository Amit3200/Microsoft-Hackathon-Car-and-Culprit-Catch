<?php
include 'db.php';
session_start();
if(isset($_POST['send']))
{
$fname=htmlspecialchars($_POST['fname']);
$lname=htmlspecialchars($_POST['lname']);
$vehicle=htmlspecialchars($_POST['vno']);
$email=htmlspecialchars($_POST['email12']);
$phone=htmlspecialchars($_POST['phn']);
$sql="insert into user(firstname, lastname, vehicle, email, phone) values ('$fname','$lname','$vehicle','$email','$phone');";
echo $sql;
    $val=$db->query($sql);
    if($val==true)
    {
        header('location: Login.php');
    }
}
session_destroy();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Smart Act:Sign up
        </title>
        
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
                width: 300px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border:1px solid #000;
            }
                        .in1
            {
                width: 150px;
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
                width:300px;
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
                margin-top: 120px;
                background: rgba(0,0,0,0.7);
                width: 400px;
                height: 450px;
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
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0; 
}
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form method="post">
                <center>
                <div class="subdivision"><br>
                    <img src="images/avatar1.png" width="120px" class="pics">
                    <h2 style="font-family:'Quicksand',sans-serif; font-size:22px;font-weight: bolder;color:white;">Signup for Smart Found</h2><br>
                    <input type="text" placeholder="First Name" required name="fname" class="in1">                    
                    <input type="text" placeholder="Last Name" required name="lname" class="in1"><br><br>
                    <input type="text" placeholder="Vehicle No." required name="vno" class="in"><br><br>
                     <input type="email" placeholder="Email" required name="email12" class="in"><br><br>
                    <input type="number" placeholder="Phone no." required name="phn" class="in"><br><br>
                    <button type="submit" class="io" name="send">Sign Up</button><br>&nbsp;
                    <a href="Login.php" style="cursor: pointer;"><p style="font-family:'Quicksand',sans-serif; font-size:14px;font-weight: bolder; color:dodgerblue;">Already have an account Login</p></a><br>
                </div>
                </center>
            </form>
        </div>
    </body>
</html>