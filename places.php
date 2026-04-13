<?php
include "config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tourist Places</title>

    <!-- CSS LINK -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- NAVBAR (simple example) -->
<div class="nav">
    <h2>Local Tourist Day Visit Planner</h2>
    <a href="index.php">Home</a>
    <a href="places.php">Places</a>
</div>

<h1 class="page-title">Tourist Places</h1>

<div class="container">

<?php
$sql = "SELECT * FROM places";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="card">

    <img src="assets/images/<?php echo $row['image']; ?>">

    <div class="card-content">

        <h3><?php echo $row['name']; ?></h3>

        <p class="small-text">
            <?php echo $row['distance']; ?>
        </p>

        <a class="btn" href="place_details.php?id=<?php echo $row['id']; ?>">
            View Place
        </a>

        <a href="select_place.php?id=<?php echo $row['id']; ?>" 
         style="background:orange; color:white; padding:5px; text-decoration:none;">
             Select
        </a>

    </div>

</div>

<?php } ?>

</div>

</body>
</html>