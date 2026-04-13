<?php
include "../config/db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM places WHERE id=$id");

// redirect with message
header("Location: dashboard.php?msg=deleted");
exit();
?>