<?php 
include 'db.php';
session_start();
$sql="select * from requestsf  limit 5";
$val=$db->query($sql);
 $rowcount=mysqli_num_rows($val);
if(isset($_POST['send1']))
{
    $KO=$_POST['geto'];
    header("location: Allsearch.php?name=$KO");
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
        function redirect()
        {
            window.location.assign("opencam.php");
        }
        function fun()
        {
            window.location.assign("userlist.php");
        }
        function kio()
        {
            window.location.assign("Charts/index.html");
        }
                function kio1()
        {
            window.location.assign("moneyreport.php");
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
                <a class="navbar-brand" href="#">ToughX</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar"  style="overflow: hidden;">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="Charts/index.html">Reports</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="#">Map</a></li>
                    <li><a href="controlpanel.php">Control Panel</a></li>
                    <li><a href="detect.php">Detect Culprit</a></li>
                    
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
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Enter Car Number</h4>
                            <form method="post"><input type="text" placeholder="Enter Vehicle Number" class="in" name="geto"><br><br>
                            <button type="submit" class="io" name="send1">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3" >
                        <div class="well" style="padding-bottom:20px;">
                            <h4>Live Camera Feed</h4><br>
                            <p style="font-size: 16px;">Open Camera</p>
                            <button onclick="redirect()" class="io">Open</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well" style="padding-bottom:45px;">
                            <h4>Live Count</h4>
                            <p>Car Counts</p>
                            <p><?php echo rand(33, 38)?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well" style="padding-bottom:20px;">
                            <h4>Total Car Requests</h4><br>
                            <p><?php echo $rowcount ?></p>
                            <button onclick="fun()" class="io">Show Details</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Toll Tax Details</p>
                            <p>Jaipur Toll Tax</p>
                            <p>Open 24 hours</p>
                            <p>8 gates</p>
                            <p>ToughX</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                             <?php while($row = mysqli_fetch_array($val)):?>
                            <p><?php echo $row['vehicle']?>&nbsp; ID#<?php echo $row['rid']?></p>
                            <?php endwhile?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Trace Recent Payments</p>
                            <button onclick="kio()" class="io">Trace Traffic</button><br><br>
                            <button onclick="kio1()" class="io">Trace Payments</button>
                            <br><p>Records</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>