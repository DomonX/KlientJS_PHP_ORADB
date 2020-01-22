<?php
    session_start();
    $_SESSION['db_username'] = $_GET['username'];
    $_SESSION['db_password'] = $_GET['password'];
?>