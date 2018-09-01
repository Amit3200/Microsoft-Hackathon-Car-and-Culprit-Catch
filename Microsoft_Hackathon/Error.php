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
    $io=$_GET['name'];
    //echo $io;
    $rope="<script>localStorage.getItem('myCat');</script>";
    $sql22="select * from pays where tid=$io";
    $val23=$db->query($sql22);
    while($row11 = mysqli_fetch_array($val23))
    {
       $to1=$row11['location']; 
    }
    $rope=$to1;
    //echo $to1;
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Smart Act:Wallet
        </title>

        <script>
            function caller()
            {  
                <?php shell_exec("python3 msg.py $rope");?>
                window.location.assign("Login.php");
            }
        </script>
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
                margin-top: 100px;
                background: rgba(0,0,0,0.7);
                width: 400px;
                height: 450px;
            }
            .io:hover
            {
                color:white;
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
                .inside
                {
                    background:#f1c40f;
                    width: 200px;
                    height: 30px;
                    opacity: 0.7;

                }
                .content
                {
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border:1px solid white;  
                }
                .content:hover
                {
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border:1px solid #3498db;  
                }
                .serv
                {
                    text-decoration: none;
                    color:black;
                    cursor: pointer;
                    border:1px solid black;
                }
                .serv:hover
                {
                  text-decoration: none;
                    color:white;
                }
                .cold
                {
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                line-height: 2;
                color:white;
                }
}
                            .content
                {
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border:1px solid white;  
                }
                .content:hover
                {
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border:1px solid #3498db;  
                }
                .serv
                {
                    text-decoration: none;
                    color:black;
                    cursor: pointer;
                    border:1px solid black;
                }
                .serv:hover
                {
                  text-decoration: none;
                    color:white;
                }
                .cold
                {
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                line-height: 2;
                color:white;
                }
                .inside
                {
                    background:#f1c40f;
                    width: 200px;
                    height: 30px;
                    opacity: 0.7;

                }
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 style="font-size:200px;color:white;">ERROR</h1>
            <h5 style="font-size:80px;color:white;">QR CAN'T BE GENERATED</h5>
            <h4 style="color:white;font-family: 'Quicksand',sans-serif;font-weight: bolder;">This car was subjected to be lost and the report was generated regarding it and so that's why the way to cross the toll tax has been blocked by the owner as per the report.</h4><br><br>
            <button class="io" name="send" onclick="caller()">Home</button><br>&nbsp;
        </div>
    </body>
</html>