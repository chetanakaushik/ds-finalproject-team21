<?php
 require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'sensorDeployedPost.php';
  exit;
}

$sensorDeployed = SensorDeployed::fetchAllSensorsDeployed();

$json = json_encode($sensorDeployed, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
