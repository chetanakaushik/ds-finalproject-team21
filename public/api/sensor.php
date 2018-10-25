<?php
 require '../../app/common.php';



$sensor = Sensor::fetchAllSensors();

$json = json_encode($sensor, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
