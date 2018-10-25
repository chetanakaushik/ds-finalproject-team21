<?php

class Client{
  public $clientId;
  public $clientName;
  public $clientDesc;
  public $gicsSector;
  public $gicsSubIndustry;
  public $headquarters;

  public function __construct($row){
    $this->clientId = isset($row['clientID']) ? intval($row['clientID']) : null;
    $this->clientName = $row['clientName'];
    $this->clientDesc = $row['clientDesc'];
    $this->gicsSector = $row['gicsSector'];
    $this->gicsSubIndustry = $row['gicsSubIndustry'];
    $this->headquarters = $row['headquarters'];
  }

  public static function fetchAll() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM Client';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theClient =  new Client($row);
      array_push($arr, $theClient);
    }
    return $arr;
  }

  public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO Client (clientName, clientDesc, gicsSector, gicsSubIndustry, headquarters)
          VALUES (?, ?, ?, ?, ?)';
  $statement = $db->prepare($sql);
  $success = $statement->execute([
      $this->clientName,
      $this->clientDesc,
      $this->gicsSector,
      $this->gicsSubIndustry,
      $this->headquarters
  ]);
  $this->clientId = $db->lastInsertId();
}
}
