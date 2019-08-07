<!DOCTYPE HTML>
<html>
<head>
<title>OpenLayers Fire Fighters</title>
</head>
<body>
  <div>
    <?php
    if(isset($_POST['lats'])){
    $lats = $_POST['lats'];
    }
    if(isset($_POST['lons'])){
    $lons = $_POST['lons'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fire_database";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $date = date("Y/m/d H:m:s");
    $sql = "INSERT INTO fire_db_table (Date, Latitude, Longitude)
    VALUES ( '" . $date . "', $lats, $lons)";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    }
    ?>
  </div>
<div id="Map" style="height:1000px"></div>
<script src="OpenLayers.js"></script>
<script>
    //var lat            = 27.663093;
    var lat            = '<?php echo $lats;?>';
    var lon            = <?php echo $lons;?>;
    var zoom           = 18;

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
    var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);

    map = new OpenLayers.Map("Map");
    var mapnik         = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));

    map.setCenter(position, zoom);
</script>
</body>
</html>
