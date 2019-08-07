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
  <div style="font-size:22px; position:relative; left:1400px; top:18px;">
    <a href="history.php"><b>History<b></a>
  </div>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top">Nepal Fire Fighter</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <form method="post" action='map.php'>
      <?php
      $strJsonFileContents = file_get_contents("location.json");
      $arrayasdasd = json_decode($strJsonFileContents, true);
      $character = json_decode($arrayasdasd);?>
      <input type='text' id='lats' name='lats' value='<?php echo $character->broker1;?>'>
      <input type='text' id='lons' name='lons' value='<?php echo $character->broker2;?>'>
      <input type='submit' value='Get Map'>
    </form>
  </div>
</div>

</body>
</html>
