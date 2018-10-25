<?php

class Sensor{
  public $sensorId;
  public $sensorName;
  public $sensorDescription;
  public $manufacturer;
  public $totalLifeExpectancy;

  public function __construct($row){
    $this->sensorId = isset($row['sensorId']) ? intval($row['sensorId']) : null;
    $this->sensorName = $row['sensorName'];
    $this->sensorDescription = $row['sensorDescription'];
    $this->manufacturer = $row['manufacturer'];
    $this->totalLifeExpectancy = $row['totalLifeExpectancyHours'];
  }

  public static function fetchAllSensors() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM Sensors';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theSensor =  new Sensor($row);
      array_push($arr, $theSensor);
    }
    return $arr;
  }

<<<<<<< HEAD

=======
  public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO Sensors (sensorName, sensorDescription, manufacturer, totalLifeExpectancyHours)
          VALUES (?, ?, ?, ?)';
  $statement = $db->prepare($sql);
  $success = $statement->execute([
      $this->sensorName,
      $this->sensorDescription,
      $this->manufacturer,
      $this->$totalLifeExpectancy
  ]);
  $this->sensorId = $db->lastInsertId();
}
>>>>>>> a6c19fd44f9bf756edf5e888e0e6ecba2f208c6f
}
