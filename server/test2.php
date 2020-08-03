<html style="height: 100%;">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>

<body id="parentbody" style="height: 98%;">
    <div id="parentdiv" style="background-color: gold; width:1904px; height:860px;">
        <canvas id="MyCanvas" width="641px" height="281px"></canvas>
        <img id="img_test" src="map2.png" style="display:none; ">
        <div id="msg" style="height: 100px;"></div>
    </div>
    <script>
        var canvas = document.getElementById("MyCanvas");
        canvas.onclick = function (evt) {
            var x = parseInt(evt.offsetX);
            var y = parseInt(evt.offsetY);
            document.getElementById("msg").innerHTML = x + "," + y;
        }
    </script>
  </body>
</html>