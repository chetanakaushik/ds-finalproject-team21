<?php
$clientNotes = new ClientNotes($_POST);
$clientNotes->create();
echo json_encode($clientNotes);

//supplemental
//added to the notes file content
