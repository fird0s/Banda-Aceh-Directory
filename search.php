<?php

include("php/connection.php");


$type_directory = mysql_query("SELECT * FROM directory_type");




?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bg.png">

    <title>Direktori Kota Banda Aceh</title>

    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

    <!-- Leaflet -->
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

    <!-- Leaflet Awesome Markers -->
    <link rel="stylesheet" href="plugins/Leaflet.awesome-markers/dist/leaflet.awesome-markers.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/Font-Awesome/css/font-awesome.min.css">

    <!-- Leaflet Easy Button  -->
    <link href="plugins/Leaflet.EasyButton/src/easy-button.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="plugins/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="plugins/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- Leaflet JS -->
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

    <!-- PACE -->
    <script src="plugins/pace/pace.js"></script>
    <link href="plugins/pace/custom.css" rel="stylesheet" />
    <link href="plugins/pace/themes/white/pace-theme-flash.css" rel="stylesheet" />

    <style type="text/css">

    body { margin:0; padding:0; }
    #map { position:absolute; top:50px; bottom:0; width:100%;
      cursor: crosshair;
    }

    .footer {
      height: 35px !important;  
    }

    body, html { 
    overflow-x: hidden; 
    overflow-y: hidden;

}

  .leaflet-clickable {
    cursor: pointer !important;
    }

  .navbar-default .navbar-nav>li>a {
    color: white;
  }



  </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<!-- Modal -->

<div id="SucessAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Information</h4>
      </div>
      <div class="modal-body">
        <p>Sucess add your directory, we are looking your directory.</p>
        <p>Thanks</p>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<!-- Modal -->
<div id="PageAbout" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">About</h3>
      </div>

      <div style="padding: 20px;">

        <p>Web ini merupakan sebuah portal berisi direktori yang ada di Banda Aceh. Adanya website ini bertujuan untuk mempermudah masyarakat untuk menemukan tempat-tempat yang  dicari seperti kedai kopi, restaurant, hotel, dan tempat tempat lainnya di Kota Banda Aceh.</p>

      </div>

       <div class="modal-header">
        <h4 class="modal-title">Contact</h4>
      </div>

      <div style="padding: 20px;">

        <p>Email : firdauskoder@gmail.com / firdaus@feb.unsyiah.ac.id</p>
        <p>Phone : +62 852 7054 6820</p>

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
        <h4 class="modal-title">Tambahkan Direktori disini?</h4>
        <div id="result"></div>
      </div>
      
    <form style="padding: 10px;">
        
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Direktori</label>
          <input type="text" name="directory_name" class="form-control" id="exampleInputEmail1" placeholder="Nama Tempat">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail2">Email</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail3">Website</label>
          <input type="text" name="website" class="form-control" id="exampleInputEmail3" placeholder="Business Website">
        </div>

        <div class="row hide">
          <div class="col-md-6">
            <input type="text" name="latitude" class="form-control" id="Latitude">
          </div>
          <div class="col-md-6">
            <input type="text" name="longtitude" class="form-control" id="Longtitude">
          </div>
        </div>

        <div class="form-group">
          <label>Direktori</label>
          <select class="form-control" id="sel1" name="type">
          <?php
         
          while ($row = mysql_fetch_assoc($type_directory)) {
            echo '<option value="'.$row['id'].'">'.$row['type'].'</option>';  
          }

          ?>   
          </select>

        </div>

        <div class="form-group">
          <label for="comment">Description:</label>
          <textarea class="form-control" name="description" rows="2" id="comment"></textarea>
        </div>


        <div class="modal-footer">
          <input type="button" class="btn btn-default btn-primary" value="Submit" onclick="add_dir();"></input>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </form>




    </div>

  </div>
</div>



    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #0072c6;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/" style="font-family: 'Pacifico', cursive; color:white; font-size: 23px;">Direktori Banda Aceh </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        <form class="navbar-form navbar-left" method="get" action="search.php">
            <input type="text" class="form-control" name="q" placeholder="find direktori">
             <button type="submit" class="btn btn-default btn-info btn-small">Search</button>
        </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Home</a></li>
            <li><a data-toggle='modal' data-target="#PageAbout" href="">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>

    <!-- Begin page content -->
    <div id="map"></div>

    


    <footer class="footer" style="background-color: #0072c6;">
      <div class="container">
        <p class="text-muted" style="margin: 10px 0; color: white;">&copy; Copyright 2016 Direktori Kota Banda Aceh. All Rights Reserved</p>
      </div>
    </footer>




   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="plugins/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- Leaflet Awesome Markers -->
    <script src="plugins/Leaflet.awesome-markers/dist/leaflet.awesome-markers.min.js"></script>

    <!-- Leaflet Easy Button  -->
    <script src="plugins/Leaflet.EasyButton/src/easy-button.js"></script>


     <script>

    var mymap = L.map('map').setView([5.5497, 95.3215], 13);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      
    }).addTo(mymap);


    L.easyButton( 'glyphicon-home', function(){
      mymap.setView([5.5497, 95.3215], 13);
    }).addTo(mymap);



    





    <?php

        $directory = mysql_query("SELECT * FROM directory INNER JOIN directory_type ON directory_type.id = directory.directory_type");

        while ($all_dir = mysql_fetch_assoc($directory)) {
            echo 
            "L.marker([".$all_dir['latitude'].", ".$all_dir['longtitude']."], {icon: L.AwesomeMarkers.icon({
              icon: '".$all_dir['css_class']."', 
              markerColor: '".$all_dir['markerColor']."',  
              prefix: 'fa', 
              iconColor: 'white'}) 
            }).addTo(mymap).bindPopup('<a href=\' view.php?id=".$all_dir['id_dir']." \'> ".$all_dir['directory_name']." </a> ');";
        }

    ?>


    <?php

     if( $_GET["q"])
      {
       
       $get_directory_sql = "SELECT * FROM directory WHERE directory_name LIKE '%" .$_GET["q"]. "%' ";
       $get_directory_sql = mysql_query($get_directory_sql) or die(mysql_error());
       $get_directory_sql = mysql_fetch_assoc($get_directory_sql);

       $types = mysql_query("SELECT * FROM directory_type WHERE id='" .$get_directory_sql['directory_type']. "' ") or die(mysql_error());
       $types = mysql_fetch_assoc($types);


       
       echo 
            "L.marker([".$get_directory_sql['latitude'].", ".$get_directory_sql['longtitude']."], {icon: L.AwesomeMarkers.icon({
              icon: '".$types['css_class']."', 
              markerColor: '".$types['markerColor']."',  
              prefix: 'fa', 
              spin : 'true',
              iconColor: 'white'}) 
            }).addTo(mymap).bindPopup('<h5>".$get_directory_sql['directory_name']."</h5><hr><b>Website : </b> ".$get_directory_sql['website']." <br> <b>Email : </b> ".$get_directory_sql['email']." <br> <br> ".$get_directory_sql['description']." ').openPopup();";

       } 

    ?>



// Disable tap handler, if present.
if (mymap.tap) mymap.tap.disable();


    // L.marker([51.5, -0.09]).addTo(mymap)
    //   .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

  

    var popup = L.popup();



    function onMapClick(e) {
      popup.setLatLng(e.latlng).setContent("<b> Tambahkan Direktori Disini ? <br> <br> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal'>YA</button>").openOn(mymap);
    }

    function OnClickSetLat(e){
      document.getElementById("Latitude").value = e.latlng.lat
      document.getElementById("Longtitude").value = e.latlng.lng


      // alert(e.latlng.lat + " " + e.latlng.lng);
    }

   

    mymap.on('click', onMapClick);
    mymap.on('click', OnClickSetLat);

    map = new L.Map('map', {zoomControl: false});

    mymap.dragging.disable();

    
   



  </script>

  <script type="text/javascript">

        function add_dir(){
          var directory = $("input[name=directory_name]").val();
          var email = $("input[name=email]").val();
          var website = $("input[name=website]").val();
          var latitude = $("input[name=latitude]").val();
          var longtitude = $("input[name=longtitude]").val();
          var type = $("select[name=type]").val();
          var description = $("textarea[name=description]").val();

          if (directory == "" || email == "" || type == "" || description == "") {
              alert("Please fill all form");
          }else{
            $.post('php/ajax_add_new_directory.php', {directory : directory, email : email, website : website, latitude:latitude, longtitude:longtitude, type:type, description:description},
            function(data){

                alert("Success add your directory.")
                location.reload();
            });
          }

          

        }

      </script>



  </body>
</html>
