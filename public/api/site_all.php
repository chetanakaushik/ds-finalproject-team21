<?php
 require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'sitePost.php';
  exit;
}

$site = Site::fetchAllSites();

$json = json_encode($site, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
