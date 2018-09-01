<?php 
if(isset($_POST['send']))
{
    shell_exec("python3 car12.py");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ToughX: Control</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function call()
        {
var yourImg = document.getElementById('fi');
if(yourImg && yourImg.style) {
    yourImg.style.width = '900px';
            }
        }
                function call1()
        {
var yourImg = document.getElementById('fi');
if(yourImg && yourImg.style) {
    yourImg.style.width = '120px';
            }
        }
    </script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
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
        
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ToughX</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Dashboard</a></li>
        <li><a href="Charts/index.html">Reports</a></li>
        <li><a href="userlist.php">User List</a></li>
        <li><a href="#">Map</a></li>
        <li class="active"><a href="controlpanel.php">Control Panel</a></li>
        <li><a href="detect.php">Culprit</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>ToughX</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="admin.php">Dashboard</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="userlist.php">User List</a></li>
        <li><a href="#">Map</a></li>
        <li class="active"><a href="controlpanel.php">Control Panel</a></li>
        <li><a href="detect.php">Culprit</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Control Panel</h4>
        <p>Here you can see the proper working and the algorithms working</p>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h4>Camera 1</h4>
              <p><video src="ImportantRajathanHack\Final Start\Cars.mp4" controls width="400px" autoplay loop></video></p> 
              <p>Detecting Number Plate</p>
              <img src="frame5.jpg" width="120px;">
              <img src="frame6.jpg" width="120px;">
              <img src="frame7.jpg" width="120px;">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h4>Camera 2</h4>
              <p><center><video src="ImportantRajathanHack\Final Start\video\video.mp4" controls width="290px" autoplay loop></video></center></p>
              <p>Detecting Traffic</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Detecting Procedure</p> 
            <p>Frame Testing</p> 
            <img src="">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Obtained Outcomes</p> 
            <p>Result</p> 
            <img src="final.png" width="120px" id="fi">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="width:70px; font-size:16px;margin-top:16px;">Watch</button>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Count Cars</p> 
            <p>Watch Feed</p> 
              <form method="post">
            <p><button type="submit" class="io" name="send">Detect</button><br>&nbsp;</p> 
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:950px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Final Image Viewer</h4>
      </div>
      <div class="modal-body">
        <p><img src="final.png" width="900px;"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>
