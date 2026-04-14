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

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        /* NAVBAR */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1a252f;
            padding: 15px 20px;
            color: white;
        }

        .nav h2 {
            margin: 0;
            font-size: 18px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }

        .nav a:hover {
            color: orange;
        }

        /* TITLE */
        .page-title {
            text-align: center;
            margin: 20px 0;
            color: #2c3e50;
        }

        /* FORM CARD */
        form {
            max-width: 500px;
            margin: 20px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        /* INPUTS */
        form input,
        form textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* BUTTON */
        .btn {
            width: 60%;
            padding: 12px;
            background: orange;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
            transition: 0.3s;
        }

        .btn:hover {
            background: darkorange;
        }

    </style>
</head>

<body>

<div class="nav">
    <h2>Admin Panel</h2>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<h1 class="page-title">Add New Place</h1>

<form method="POST">

    <input type="text" name="name" placeholder="Place Name" required>

    <input type="text" name="category" placeholder="Category (e.g., Beach, Temple)" required>

    <input type="text" name="distance" placeholder="Distance (e.g., 5km)" required>

    <textarea name="description" placeholder="Description" required></textarea>

    <input type="text" name="image" placeholder="Image file name (example: beach.jpg)" required>

    <textarea name="map_link" placeholder="Paste iframe map code here" required></textarea>

    <button class="btn" type="submit" name="submit">Add Place</button>

</form>

</body>
</html>