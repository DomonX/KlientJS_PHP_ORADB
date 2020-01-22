<?php
    include '../db.php';
    $db = new DBController;
    $db->connect();
    //echo "SELECT * FROM " . $_GET["tableName"];
    //echo json_encode($db->performQuery("SELECT * FROM " . $_GET["tableName"]));
    $db->printQuerryAsTable($db->performQuery("SELECT * FROM " . $_GET["tableName"]));
    $db->close();
?>