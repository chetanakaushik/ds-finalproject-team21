<?php
 require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'turbineDeployedPost.php';
  exit;
}

$turbineDeployed = TurbineDeployed::fetchAllTurbineDeployed();

$json = json_encode($turbineDeployed, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
