<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $category = $_POST['category'];
    $distance = $_POST['distance'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $map_link = $_POST['map_link'];

    $sql = "INSERT INTO places (name, category, distance, description, image, map_link)
            VALUES ('$name', '$category', '$distance', '$description', '$image', '$map_link')";

    mysqli_query($conn, $sql);

// redirect with message
header("Location: dashboard.php?msg=added");
exit();

    echo "Place added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Place</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="nav">
    <h2>Admin Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
</div>

<h1 class="page-title">Add New Place</h1>

<form method="POST" style="max-width:500px; margin:auto;">

    <input type="text" name="name" placeholder="Place Name" required><br><br>

    <input type="text" name="category" placeholder="Category" required><br><br>

    <input type="text" name="distance" placeholder="Distance" required><br><br>

    <textarea name="description" placeholder="Description" required></textarea><br><br>

    <input type="text" name="image" placeholder="Image file name (example: beach.jpg)" required><br><br>

    <textarea name="map_link" placeholder="Paste iframe map code here" required></textarea><br><br>

    <button class="btn" type="submit" name="submit">Add Place</button>

</form>

</body>
</html>