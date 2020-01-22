<?php
session_start();
class DBController {
    public $conn;
    public function connect() {
        $this->conn = oci_connect($_SESSION['db_username'], $_SESSION['db_password'], 'localhost/ORCL');
        if (!$this->conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }
    public function selectAll($from) {
        return $this->performQuery('SELECT * FROM ' . $from);
    }
    public function insertInto() {
        return $this->performQuery("insert into Posterunki (posterunek_id, FK_id_komendy, adres) values (Posterunki_Seq.nextval, 3, '0 Red Cloud Plaza')");
    }
    public function createSequences() {
        $this->runQueriesFromFile('sequence');
    }
    public function runQueriesFromFile($filename) {
        $sql = file_get_contents('endpoints/sql/' . $filename . '.sql', true);
        $querries = explode(";", $sql);
        foreach($querries as $query) {
            $this->performQuery($query);
            // echo $query . '<br>';
        }
    }
    public function performQuery($query) {
        $stid = oci_parse($this->conn, $query);
        if (!$stid) {
            $e = oci_error($this->conn);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
        $r = oci_execute($stid);
        if (!$r) {
            $e = oci_error($stid);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
        return $stid;
    }
    public function close() {
        oci_close($this->conn);
    }
    public function printQuerryAsTable($queryResult) {
        print "<table class='table'>\n";
        while ($row = oci_fetch_array($queryResult, OCI_ASSOC+OCI_RETURN_NULLS)) {
            print "<tr>\n";
            foreach ($row as $item) {
                print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
            print "</tr>\n";
        }
        print "</table>\n";
    }
}

?>