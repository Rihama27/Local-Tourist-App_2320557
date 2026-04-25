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
            background: #2c3e50;
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

        /* CONTAINER */
        .details-container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        /* TITLE */
        .details-container h1 {
            margin-top: 0;
            color: #2c3e50;
        }

        /* IMAGE */
        .details-container img {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            display: block;
            margin: 15px auto;
        }

        /* TEXT */
        .details-container p {
            color: #555;
            line-height: 1.6;
        }

        /* MAP */
        iframe {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            border: none;
            margin-top: 10px;
        }

        /* BUTTON */
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: orange;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn:hover {
            background: darkorange;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="nav">
    <h2>Local Tourist Day-Visit Planner</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="places.php">Places</a>
        <a href="planner.php">Planner</a>
    </div>
</div>

<div class="details-container">

    <h1><?php echo $row['name']; ?></h1>

    <p><b>Category:</b> <?php echo $row['category']; ?></p>
    <p><b>Distance:</b> <?php echo $row['distance']; ?></p>

    <img src="assets/images/<?php echo $row['image']; ?>">

    <p style="margin-top:20px;">
        <?php echo $row['description']; ?>
    </p>

    <h3>Location</h3>
    <?php echo $row['map_link']; ?>

    <a href="places.php" class="btn">← Back to Places</a>

</div>

</body>
</html>