<?php
 require '../../app/common.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   require 'notesPost.php';
   exit;
 }

$notes = ClientNotes::fetchAllNotes();

$json = json_encode($notes, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;



//Supplemental
// to the notes.php file
