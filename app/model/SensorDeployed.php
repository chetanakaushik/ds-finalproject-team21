<?php

class SensorDeployed{
  public $sensorDeployedID;
  public $sensorId;
  public $turbineDeployedId;
  public $serialNumber;
  public $deployedDate;

  public function __construct($row){
    $this->sensorDeployedID = isset($row['sensorDeployedID']) ? intval($row['sensorDeployedID']) : null;
    $this->sensorId = intval($row['sensorId']);
    $this->turbineDeployedId = intval($row['turbineDeployedId']);
    $this->serialNumber = $row['serialNumber'];
    $this->deployedDate = $row['deployedDate'];
  }

  public static function fetchAllSensorsDeployed() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM SensorsDeployed';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theSensorDeployed =  new SensorDeployed($row);
      array_push($arr, $theSensorDeployed);
    }
    return $arr;
  }

  public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO SensorsDeployed (sensorId,turbineDeployedId,serialNumber,deployedDate)
          VALUES (?, ?, ?, ?)';
  $statement = $db->prepare($sql);
  $success = $statement->execute([
      $this->sensorId,
      $this->turbineDeployedId,
      $this->serialNumber,
      $this->deployedDate
  ]);
  $this->sensorDeployedID = $db->lastInsertId();
}

public static function getSensorDeployedByTurbineDeployedID(int $turbineDeployedId) {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM SensorsDeployed WHERE turbineDeployedId = ?';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute(
        [$turbineDeployedId]
    );
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      // 4.a. For each row, make a new work object
      $sensorDeployedItem =  new SensorDeployed($row);
      array_push($arr, $sensorDeployedItem);
    }
    return $arr;
  }


}
