<?php
require 'phpMQTT.php';



$address = "beta-admin.easy-q.online";
$port = 1883;
$topic = "RTS666/wififire";
$clientid = "b535052417f74ca88c2d2568035a6039";
$username = "rtsmqtt";
$password = "rtsmqttpassword123*#";




function procmsg($topic, $msg){

  $character = json_decode($msg);
  echo "$character->broker1\n";
  echo "$character->broker2";

}

$mqtt = new Bluerhinos\phpMQTT($address, $port, $clientid);
if ($mqtt->connect(true, NULL, $username, $password)) {
  $topics[$topic] = array(
      "qos" => 0,
      "function" => "procmsg"
  );
  $mqtt->subscribe($topics,0);
  while($mqtt->proc()) {}
  $mqtt->close();
} else {
  exit(1);
}
