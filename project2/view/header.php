<!DOCTYPE html>
<html>
    <head>
      <title><?= htmlspecialchars($title) ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
      #select_route {width:20%;height:200px;}
      </style>

      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript" src="../model/data.js"></script>  

    </head>
    
    <body onload="initialize();">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="color:#FFCC00;" href="#">BART</a>
            </div>
          </div>
    	</div>
    	<br><br><br>