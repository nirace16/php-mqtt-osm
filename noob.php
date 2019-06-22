<!DOCTYPE html>
<html>
<title>Nepal Fire Fighter</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('assets/forestbridge.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    Event
  </div>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top">Nepal Fire Fighter</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <form type="post" action='map.php'>
      <input type='text' id='lats' name='lats' value='112255'>
      <input type='text' id='lons' name='lons' value='12255'>
      <input type='submit' value='Get Map'>
    </form>
  </div>
</div>

</body>
</html>


<?php
require 'phpMQTT/phpMQTT.php';
// define('BROKER', 'postman.cloudmqtt.com');

$broker = "postman.cloudmqtt.com";
// define('PORT', 14324);

$port = "14294";
// define('CLIENT_ID', "pubclient_" + getmypid());
// define('USERNAME', "belctohb");
$usrname = "ehtdgmsq";

// define('PASSWORD', "n5xHF_6WRNtI");

$pass = "ERcebj1zb8_3";

$client_id = "phpMQTT-subscriber";

$topic = "parctise";

// $mqtt = new Bluerhinos\phpMQTT($broker, $port, $client_id);
// if ($mqtt->connect(true, NULL, $usrname, $pass)) {
//   $topics[$topic] = array(
//       "qos" => 0,
//       "function" => "procmsg"
//   );
//   $mqtt->subscribe($topics,0);
//   while($mqtt->proc()) {}
//   $mqtt->close();
// } else {
//   exit(1);
// }
// define('BROKER', 'm16.cloudmqtt.com');
// define('PORT', 12273);
// define('CLIENT_ID', "pubclient_" + getmypid());
// define('USERNAME', "zxtlrbfc");
// define('PASSWORD', "_Eb31Pazl0YY");


//$url = "m16.cloudmqtt.com";
//$port = 12273;
//$client_id = "phpMQTT-subscriber";

function procmsg($topic, $msg){
  echo "Msg Recieved: $msg\n";
}

// $mqtt = new Bluerhinos\phpMQTT(BROKER, PORT, CLIENT_ID);
// if ($mqtt->connect(true, NULL, USERNAME, PASSWORD)) {
//   $topics[$topic] = array(
//       "qos" => 0,
//       "function" => "procmsg"
//   );
//   $mqtt->subscribe($topics,0);
//   while($mqtt->proc()) {}
//   $mqtt->close();
// } else {
//   exit(1);
// }
?>
<!--
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">

      jQuery(document).ready(function($){
      $.get(location.protocol + '//nominatim.openstreetmap.org/search?format=json&q='+address, function(data){
        //console.log(data);
        latitude = 27.123231231;
        longitude = 87.23232;
  var mymap = L.map('mapid').setView([latitude, longitude], 13);
  L.tileLayer('https://api.tiles.mapbox.com/v4/{id  }/{z}/{x}/{y}.png?access_token={accessToken}', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',

  maxZoom: 18,
  id: 'mapbox.streets',
  accessToken: 'pk.eyJ1Ijoic3ViaWsiLCJhIjoiY2p4NGh5dmRzMDh6ZTQ5bnlzN3J4OWJ5aSJ9.Wo8nkfX16gl32VH_wkp7uA  '
      }).addTo(mymap);
      //Adding marker on the point
      var marker = L.marker([latitude, longitude]).addTo(mymap);
      //Adding circle on the point
      var circle = L.circle([latitude, longitude], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mymap);

      //Adding pop up on the marker
      marker.bindPopup("<b>Event Address</b><br>"+name_of_place).openPopup();
  });

});
console.log('s');
</script>-->

<script src="mqttws31.js" type="text/javascript"></script>
<script type="text/javascript">

  // Create a client instance
  client = new Paho.MQTT.Client("host", port,"client_id");
  //Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));

  // set callback handlers
  client.onConnectionLost = onConnectionLost;
  client.onMessageArrived = onMessageArrived;
  var options = {
    useSSL: true,
    userName: "username",
    password: "password",
    onSuccess:onConnect,
    onFailure:doFail
  }

  // connect the client
  client.connect(options);

  // called when the client connects
  function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    console.log("onConnect");
    client.subscribe("/cloudmqtt");
    message = new Paho.MQTT.Message("Hello CloudMQTT");
    message.destinationName = "/cloudmqtt";
    client.send(message);
  }

  function doFail(e){
    console.log(e);
  }

  // called when the client loses its connection
  function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
      console.log("onConnectionLost:"+responseObject.errorMessage);
    }
  }

  // called when a message arrives
  function onMessageArrived(message) {
    console.log("onMessageArrived:"+message.payloadString);
  }
</script>
