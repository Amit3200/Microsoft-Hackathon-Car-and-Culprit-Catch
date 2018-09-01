<?php 
include 'db.php';
session_start();
$ko=$_GET['name'];
$sql="select * from user where vehicle='$ko'";
$sql1="select * from requestsf where vehicle='$ko'";
$val=$db->query($sql);
$val1=$db->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Found:Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function redirect()
        {
            window.location.assign("opencam.php");
        }
    </script>
    <style>
         .in {
                width: 250px;
             padding: 3px;
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
        .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
        body
        {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
        }
    
         
        .io:hover{
            color:white;
        }
   
         @media screen and (min-width: 767px) {
         .in
            {
                width: auto;
            }
            .io
            {
                width: auto;
            }
        }
        
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
                <a class="navbar-brand" href="#">Bits Please</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar"  style="overflow: hidden;">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#">Map</a></li>
                    <li><a href="controlpanel.php">Control Panel</a></li>
                    <li><a href="detect.php">Culprit</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>BITS PLEASE</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#section4">Map</a></li>
                     <li><a href="controlpanel.php">Control Panel</a></li>
                     <li><a href="detect.php">Culprit</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">
                    <h4><b>Smart Tool Tax System</b></h4>
                    <p>System is designed to find the lost or stolen cars from the cctv footage and will also try to find the culprit using face detection.</p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <h4>Data</h4>
                            <?php while($row = mysqli_fetch_array($val)):?>
                            <?php while($row1 = mysqli_fetch_array($val1)):?>
                            <p><?php echo $row['firstname']?>&nbsp;<?php echo $row['vehicle']?>&nbsp;<?php echo $row['Status']?>&nbsp;<?php echo $row1['rid']?>&nbsp;<?php echo $row1['RequestedDate']?>&nbsp;Jaipur</p>
                            <?php endwhile?>
                            <?php endwhile?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>