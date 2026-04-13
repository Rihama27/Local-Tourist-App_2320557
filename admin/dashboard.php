<?php
include "../config/db.php";
session_start();


if(isset($_GET['msg'])) {

    if($_GET['msg'] == "deleted") {
        echo "<script>alert('Place deleted successfully');</script>";
    }

    if($_GET['msg'] == "added") {
        echo "<script>alert('Place added successfully');</script>";
    }
    if($_GET['msg'] == "updated") {
        echo "<script>alert('Place updated successfully');</script>";
    }
}


if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM places");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>

<body>

<h1>Admin Dashboard</h1>

<a href="add_place.php">Add Place</a>

<a href="logout.php" 
   style="background:black; color:white; padding:5px; text-decoration:none; margin-left:10px;">
   Logout
</a>

<hr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div style="border:1px solid #ccc; padding:10px; margin:10px;">

        <h3><?php echo $row['name']; ?></h3>

        <p><?php echo $row['category']; ?></p>

        <p><?php echo $row['distance']; ?></p>

        <a href="delete_place.php?id=<?php echo $row['id']; ?>" 
                onclick="return confirm('Are you sure you want to delete this place?')"
           style="background:red; color:white; padding:5px;">
           Delete
        </a>
        <a href="edit_place.php?id=<?php echo $row['id']; ?>" 
            style="background:green; color:white; padding:5px; text-decoration:none;">
            Edit
        </a>
    </div>

<?php } ?>

</body>
</html>
    