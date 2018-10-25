<?php
 require '../../app/common.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   require 'sensorPost.php';
   exit;
 }

$sensor = Sensor::fetchAllSensors();

$json = json_encode($sensor, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
