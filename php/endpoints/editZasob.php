<?php
    include '../db.php';
    $db = new DBController;
    $db->connect();
    $query = "UPDATE ZASOBY SET ";
    $data = json_decode($_GET['data']);
    $query .= " FK_id_pracownika = " . $data[1] . ",";
	$query .= " rodzaj = " . "'" . $data[2] . "'" . ",";
	$query .= " nazwa = " . "'" . $data[3] . "'";
	$query .= " WHERE zasob_id = " . $data[0];
	echo $query;
    $db->performQuery($query);
    $db->close();
?>