<?php

class SensorTimeSeries{
  public $timeSeriesId;
  public $sensorDeployedId;
  public $dataCollectedDate;
  public $output;
  public $heatRate;
  public $compressorEfficiency;
  public $availability;
  public $reliability;
  public $firedHours;
  public $trips;
  public $starts;

  public function __construct($row){
    $this->timeSeriesId = isset($row['timeSeriesId']) ? intval($row['timeSeriesId']) : null;
    $this->sensorDeployedId = $row['sensorDeployedId'];
    $this->dataCollectedDate = $row['dataCollectedDate'];
    $this->output = $row['output'];
    $this->heatRate = $row['heatRate'];
    $this->compressorEfficiency = $row['compressorEfficiency'];
    $this->availability = $row['availability'];
    $this->reliability = $row['reliability'];
    $this->firedHours = $row['firedHours'];
    $this->trips = $row['trips'];
    $this->starts = $row['starts'];
  }

  public static function fetchAllSensors() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM sensorTimeSeries';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theSensor =  new SensorTimeSeries($row);
      array_push($arr, $theSensor);
    }
    return $arr;
  }

  public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO sensorTimeSeries (sensorDeployedId, dataCollectedDate, output,
    heatRate, compressorEfficiency, availability, reliability, firedHours,
    trips, starts)
          VALUES (?, ?, ?, ?,?, ?, ?, ?,?,?)';
  $statement = $db->prepare($sql);
  $success = $statement->execute([
      $this->sensorDeployedId,
      $this->dataCollectedDate,
      $this->output,
      $this->heatRate,
      $this->compressorEfficiency,
      $this->availability,
      $this->reliability,
      $this->firedHours,
      $this->trips,
      $this->starts
  ]);
  $this->timeSeriesId = $db->lastInsertId();
}

public static function getSensorByID(int $sensorDeployedId) {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM sensorTimeSeries WHERE sensorDeployedId = ?';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute(
        [$sensorDeployedId]
    );
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      // 4.a. For each row, make a new work object
      $sensorItem =  new SensorTimeSeries($row);
      array_push($arr, $sensorItem);
    }
    return $arr;
  }


}
