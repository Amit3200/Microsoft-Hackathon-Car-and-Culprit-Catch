<?php 
include 'db.php';
session_start();
$sql="select * from pays";
$val=$db->query($sql);
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
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#">Map</a></li>
                    <li><a href="controlpanel.php">Control Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>ToughX</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#section4">Map</a></li>
                     <li><a href="controlpanel.php">Control Panel</a></li>
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
                             <h4>Details</h4>
                            <?php while($row = mysqli_fetch_array($val)):?>
        <p><?php echo $row['tid']?>&nbsp;<?php echo $row['balance']?>&nbsp;<?php echo $row['vehicle']?>&nbsp;<?php echo $row['location']?></p>
                            <?php endwhile ?>
                            <center>    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Show Reports</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reports View</h4>
      </div>
      <div class="modal-body">
          <?php shell_exec("python3 barmap.py")?>
          <p><center><img src="data1.png" width="500px"></center></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>