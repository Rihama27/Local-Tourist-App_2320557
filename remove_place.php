<?php
session_start();

$id = $_GET['id'];

if(($key = array_search($id, $_SESSION['plan'])) !== false){
    unset($_SESSION['plan'][$key]);
}

header("Location: planner.php?msg=removed");
exit();
?>