<?php
include "config/db.php";

$id = $_GET['id'];

// save into database (avoid duplicates)
$check = mysqli_query($conn, "SELECT * FROM plans WHERE place_id=$id");

if(mysqli_num_rows($check) == 0){
    mysqli_query($conn, "INSERT INTO plans (place_id) VALUES ($id)");
}

header("Location: places.php?msg=added");
exit();
?>