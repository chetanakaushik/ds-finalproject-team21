<?php

class Site{
  public $siteId;
  public $clientId;
  public $siteName;
  public $siteDescription;
  public $primaryContact;
  public $capacity;
  public $commercialDate;
  public $addrLine1;
  public $addrLine2;
  public $addrCity;
  public $addrState;
  public $addrZip;
  public $addrCountry;

  public function __construct($row){
    $this->siteId = isset($row['siteId']) ? intval($row['siteId']) : null;
    $this->clientId =intval( $row['clientId']);
    $this->siteName = $row['siteName'];
    $this->siteDescription = $row['siteDescription'];
    $this->primaryContact = $row['primaryContact'];
    $this->capacity = intval($row['capacity']);
    $this->commercialDate = $row['commercialDate'];
    $this->addrLine1 = $row['addrLine1'];
    $this->addrLine2 = $row['addrLine2'];
    $this->addrCity = $row['addrCity'];
    $this->addrState = $row['addrState'];
    $this->addrZip = $row['addrZip'];
    $this->addrCountry = $row['addrCountry'];
  }

  public static function fetchAllSites() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM Site';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theSite =  new Site($row);
      array_push($arr, $theSite);
    }
    return $arr;
  }

  public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO Site
  (clientId,siteName,siteDescription,primaryContact,capacity,
    commercialDate,addrLine1,addrLine2,addrCity,addrState,addrZip,addrCountry)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
  $statement = $db->prepare($sql);
  $success = $statement->execute([
      $this->clientId,
      $this->siteName,
      $this->siteDescription,
      $this->primaryContact,
      $this->capacity,
      $this->commercialDate,
      $this->addrLine1,
      $this->addrLine2,
      $this->addrCity,
      $this->addrState,
      $this->addrZip,
      $this->addrCountry
  ]);
  $this->siteId = $db->lastInsertId();
}
}
