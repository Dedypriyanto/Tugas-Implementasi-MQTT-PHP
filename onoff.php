<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
require("phpMQTT.php");
require("config.php");
$topic="iot/kendali";

$message = @$_GET['message'];

if(empty($message)) { $message = "TEST"; }

//mqtt
$mqtt = new bluerhinos\phpMQTT($host, $port, "ClientID".rand());

if ($mqtt->connect(true,NULL,$username,$password)) {
    $mqtt->publish($topic,$message, 0);
    $mqtt->close();
}else{
    echo "Fail or time out
    ";
}


?>
<a href="/php/onoff.php?message=D1=1" class="btn btn-success"> D1 ON </a> &nbsp;
<a href="/php/onoff.php?message=D1=0" class="btn btn-danger"> D1 Off </a>
<br/>
<a href="/php/onoff.php?message=D2=1" class="btn btn-success"> D2 ON </a> &nbsp;
<a href="/php/onoff.php?message=D2=0" class="btn btn-danger"> D2 Off </a>
<br/>
<a href="/php/onoff.php?message=D3=1" class="btn btn-success"> D3 ON </a> &nbsp;
<a href="/php/onoff.php?message=D3=0" class="btn btn-danger"> D3 Off </a>