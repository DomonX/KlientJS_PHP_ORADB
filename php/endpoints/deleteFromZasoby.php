<?php
    include '../db.php';
    $db = new DBController;
    $db->connect();
    $query = 'DELETE FROM ZASOBY WHERE ZASOB_ID = ' . $_GET['id'];
    $db->performQuery($query);
    $db->close();
?>