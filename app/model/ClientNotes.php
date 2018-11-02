<?php

class ClientNotes{
  public $notesId;
  public $clientId;
  public $noteTitle;
  public $noteContent;
  public $createdDate;

  public function __construct($row){
    $this->notesId = isset($row['notesId']) ? intval($row['notesId']) : null;
    $this->clientId = intval($row['clientId']);
    $this->noteTitle = $row['noteTitle'];
    $this->noteContent = $row['noteContent'];
    $this->createdDate = $row['createdDate'];
  }

  public static function fetchAllNotes() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM ClientNotes';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute();
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $notes =  new ClientNotes($row);
      array_push($arr, $notes);
    }
    return $arr;
  }

  public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO ClientNotes (clientId, noteTitle, noteContent, createdDate)
          VALUES (?, ?, ?, ?)';
  $statement = $db->prepare($sql);
  $success = $statement->execute([
      $this->clientId,
      $this->noteTitle,
      $this->noteContent,
      $this->createdDate
  ]);
  $this->notesId = $db->lastInsertId();
}

public static function getNotesByclientID(int $clientId) {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'SELECT * FROM ClientNotes WHERE clientId = ?';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute(
        [$clientId]
    );
    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      // 4.a. For each row, make a new work object
      $noteItem =  new ClientNotes($row);
      array_push($arr, $noteItem);
    }
    return $arr;
  }


}
