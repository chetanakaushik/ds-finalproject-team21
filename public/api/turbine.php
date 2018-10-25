<?php
phpinfo();
 /*require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'turbinePost.php';
  exit;
}

$turbine = Turbine::fetchAllTurbines();

$json = json_encode($turbine, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
