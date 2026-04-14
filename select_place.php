<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['plan'])) {
    $_SESSION['plan'] = [];
}

$_SESSION['plan'][] = $id;
$_SESSION['plan'] = array_unique($_SESSION['plan']);

// redirect with message
header("Location: places.php?msg=selected");
exit();
?>