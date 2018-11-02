<?php
$clientNotes = new ClientNotes($_POST);
$clientNotes->create();
echo json_encode($clientNotes);
