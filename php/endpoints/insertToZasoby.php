<?php
    include '../db.php';
    $db = new DBController;
    $db->connect();
    $query = 'INSERT INTO ZASOBY VALUES (';
    $data = json_decode($_GET['data']);
    $query .= 'zasoby_seq.nextval, ';
    $query .= $data[0] . ',';
    $query .= "'" . $data[1] . "'" . ',';
    $query .= "'" . $data[2] . "'";
    $query .= ')';
    $db->performQuery($query);
    $db->close();
?>