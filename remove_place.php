<?php
include "config/db.php";

$id = $_GET['id'];

// delete from database
mysqli_query($conn, "DELETE FROM plans WHERE place_id=$id");

header("Location: planner.php?msg=removed");
exit();
?>