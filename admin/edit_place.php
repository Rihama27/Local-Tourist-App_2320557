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

<h2>Edit Place</h2>

<form method="POST">

    Name:<br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    Category:<br>
    <input type="text" name="category" value="<?php echo $row['category']; ?>"><br><br>

    Distance:<br>
    <input type="text" name="distance" value="<?php echo $row['distance']; ?>"><br><br>

    Description:<br>
    <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>

    Image:<br>
    <input type="text" name="image" value="<?php echo $row['image']; ?>"><br><br>

    Map Link:<br>
    <textarea name="map_link"><?php echo $row['map_link']; ?></textarea><br><br>

    <button type="submit" name="update">Update</button>

</form>