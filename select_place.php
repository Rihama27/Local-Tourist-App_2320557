<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['plan'])) {
    $_SESSION['plan'] = [];
}

// add selected place
$_SESSION['plan'][] = $id;

// remove duplicates
$_SESSION['plan'] = array_unique($_SESSION['plan']);

header("Location: places.php");
exit();
?>