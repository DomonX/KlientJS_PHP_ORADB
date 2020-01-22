<?php
    include 'db.php';
    $db = new DBController;
    $db->connect();
    $db->printQuerryAsTable($db->performQuery("SELECT * FROM " . $_GET["tableName"]));
    $db->close();
?>