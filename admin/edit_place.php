<?php
include "../config/db.php";

$id = $_GET['id'];
if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $category = $_POST['category'];
    $distance = $_POST['distance'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $map_link = $_POST['map_link'];

    $sql = "UPDATE places SET 
            name='$name',
            category='$category',
            distance='$distance',
            description='$description',
            image='$image',
            map_link='$map_link'
            WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: dashboard.php?msg=updated");
    exit();
}

// get data from database
$result = mysqli_query($conn, "SELECT * FROM places WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Place</title>

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

        /* LABELS */
        label {
            font-weight: bold;
            color: #2c3e50;
            font-size: 14px;
        }

        /* INPUTS */
        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px;
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
            background: #3498db;
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
            background: #2980b9;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="nav">
    <h2>Admin Panel</h2>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<h1 class="page-title">Edit Place</h1>

<form method="POST">

    <label>Name</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

    <label>Category</label>
    <input type="text" name="category" value="<?php echo $row['category']; ?>" required>

    <label>Distance</label>
    <input type="text" name="distance" value="<?php echo $row['distance']; ?>" required>

    <label>Description</label>
    <textarea name="description" required><?php echo $row['description']; ?></textarea>

    <label>Image</label>
    <input type="text" name="image" value="<?php echo $row['image']; ?>" required>

    <label>Map Link</label>
    <textarea name="map_link" required><?php echo $row['map_link']; ?></textarea>

    <button class="btn" type="submit" name="update">Update Place</button>

</form>

</body>
</html>