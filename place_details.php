<?php
include "config/db.php";
?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM places WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $row['name']; ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- NAVBAR -->
<div class="nav">
    <h2>Local Tourist Day Visit Planner</h2>
    <a href="index.php">Home</a>
    <a href="places.php">Places</a>
</div>

<div class="details-container">

    <h1><?php echo $row['name']; ?></h1>

    <p><b>Category:</b> <?php echo $row['category']; ?></p>
    <p><b>Distance:</b> <?php echo $row['distance']; ?></p>

    <img src="assets/images/<?php echo $row['image']; ?>" style="width:100%; max-width:500px; border-radius:10px;">

    <p style="margin-top:20px;">
        <?php echo $row['description']; ?>
    </p>

    <h3>Location</h3>
    <?php echo $row['map_link']; ?>

    <br><br>

    <a href="places.php" class="btn">← Back to Places</a>

</div>

</body>
</html>