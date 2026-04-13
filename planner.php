<?php
include "config/db.php";
session_start();

if(!isset($_SESSION['plan'])) {
    $_SESSION['plan'] = [];
}

$ids = $_SESSION['plan'];

echo "<h2>Your Plan</h2>";

if(count($ids) == 0){
    echo "No places selected.";
    exit();
}

$idList = implode(",", $ids);

$result = mysqli_query($conn, "SELECT * FROM places WHERE id IN ($idList)");

while($row = mysqli_fetch_assoc($result)) {
    echo "<div style='padding:10px; border:1px solid #ccc; margin:10px;'>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p>".$row['category']."</p>";
    echo "</div>";
}
?>