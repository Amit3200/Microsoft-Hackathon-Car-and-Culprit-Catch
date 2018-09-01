<?php 
include 'db.php';
ini_set('max_execution_time', 600);
session_start();
$sql="select * from pays";
$val=$db->query($sql);
if(isset($_POST['deb'])){
    //echo "CulpritDetect//detect_f.py";
    shell_exec("python3 detect_f.py");
}
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
                <a class="navbar-brand" href="#">ToughX</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar"  style="overflow: hidden;">
                <ul class="nav navbar-nav">
                    <li class><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#">Map</a></li>
                    <li><a href="controlpanel.php">Control Panel</a></li>
                    <li class="active"><a href="detect.php">Culprit</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>ToughX</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li ><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#section4">Map</a></li>
                     <li><a href="controlpanel.php">Control Panel</a></li>
                     <li class="active"><a href="detect.php">Culprit</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">
                    <h4><b>Scan and Find Report</b></h4>
                    <p>Culprit Scanner and Find!
                    <span style="font-size:14px;">Place the culprit in front of the camera!</span>
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <h4>Click To Scan</h4>
                            <form action="" method="post">
                                <center><input type="submit" class="btn btn-info btn-lg" value="Start Scan" name="deb"></center>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>