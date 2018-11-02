<?php

// Change the working directory to this file.
chdir(__DIR__);
set_include_path (__DIR__);

if ($_SERVER['REQUEST_METHOD'] == 'POST'
&& stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== false ) {
  $_POST = json_decode(file_get_contents('php://input'), true);
}

require 'environment.php';

/** MODELS **/
require 'model/Client.php';
require 'model/Sensor.php';
require 'model/Turbine.php';
require 'model/Site.php';
require 'model/TurbineDeployed.php';
require 'model/SensorDeployed.php';
require 'model/ClientNotes.php';
require 'model/SensorTimeSeries.php';
