<?php
    include '../db.php';
    $db = new DBController;
    $db->connect();
    $val = $db->createModel($db->performQuery("SELECT * FROM " . $_GET["tableName"]));
    echo json_encode($val);
    $db->close();
?>