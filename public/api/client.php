<?php
 require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'clientPost.php';
  exit;
}


$client = Client::fetchAll();

$json = json_encode($client, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
