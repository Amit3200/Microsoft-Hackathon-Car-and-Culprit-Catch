<html>
<head>
    <title>
        Live Feed
    </title>
    <style>
               body {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                background: #11998e; 
                background: -webkit-linear-gradient(to right, #38ef7d, #11998e); 
                background: linear-gradient(to right, #38ef7d, #11998e);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
    </style>
</head>
    <body>
        <center><h2>BITS PLEASE LIVE FEED</h2></center>
        <center><video autoplay></video></center>
<script>
  var onFailSoHard = function(e) {
    console.log('Reeeejected!', e);
  };

  // Not showing vendor prefixes.
  navigator.getUserMedia({video: true, audio: true}, function(localMediaStream) {
    var video = document.querySelector('video');
    video.src = window.URL.createObjectURL(localMediaStream);

    // Note: onloadedmetadata doesn't fire in Chrome when using it with getUserMedia.
    // See crbug.com/110938.
    video.onloadedmetadata = function(e) {
      // Ready to go. Do some stuff.
    };
  }, onFailSoHard);
</script>
    </body>
</html>