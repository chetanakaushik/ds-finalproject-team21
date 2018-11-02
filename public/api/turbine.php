<?php
 require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'turbinePost.php';
  exit;
}

$turbineId = intval($_GET['turbineId'] ?? 0);
if ($turbineId < 1) {
  throw new Exception('Invalid Site ID');
}
// 1. Go to the database and get all work associated with the $taskId
$turbine = Turbine::getTurbineByID($turbineId);

//$turbine = Turbine::fetchAllTurbines();

$json = json_encode($turbine, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
