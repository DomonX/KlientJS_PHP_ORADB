<?php
    include '../db.php';
    $db = new DBController;
    $db->connect();
    $db->runQueriesFromFile($_GET["filename"]); 
    $db->close();
?>