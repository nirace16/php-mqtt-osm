<?php
$strJsonFileContents = file_get_contents("location.json");
var_dump($strJsonFileContents);
$arrayasdasd = json_decode($strJsonFileContents, true);
echo '<br>';
print_r($arrayasdasd);
$character = json_decode($arrayasdasd);
echo '<br>';
echo $character->broker1;
echo '<br>';
echo $character->broker2;
?>
