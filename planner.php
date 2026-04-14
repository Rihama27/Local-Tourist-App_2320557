<?php
include "config/db.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Planner</title>

    <style>
        body{
            margin:0;
            font-family: Arial;
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
        }

        .nav{
            background: linear-gradient(90deg, #365563, #1e3a5f);
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav h2{
            color: white;
            margin: 0;
        }

        .nav a{
            color: white;
            text-decoration: none;
            margin: 0 8px;
            padding: 8px 15px;
            border-radius: 20px;
            transition: 0.3s;
        }

        .nav a:hover{
            background: orange;
            color: black;
        }

        .title{
            text-align:center;
            color:#365563;
            margin-top:20px;
        }

        .card{
            background:white;
            max-width:800px;
            margin:15px auto;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 4px 12px rgba(0,0,0,0.15);
            transition:0.3s;
        }

        .card:hover{
            transform: scale(1.01);
        }

        .card img{
            width:100%;
            height:200px;
            object-fit:cover;
        }

        .card-content{
            padding:15px;
        }

        .btn{
            background:blue;
            color:white;
            padding:6px 12px;
            text-decoration:none;
            border-radius:5px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="nav">
    <h2>Local Tourist Planner</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="places.php">Places</a>
        <a href="planner.php">Planner</a>
        <a href="about.php">About</a>
    </div>
</div>

<h2 class="title">Your Travel Plan</h2>

<?php
// POPUP MESSAGE
if(isset($_GET['msg']) && $_GET['msg'] == "removed"){
    echo "<script>alert('Place removed successfully');</script>";
}
if(isset($_GET['msg']) && $_GET['msg'] == "added"){
    echo "<script>alert('Place added successfully');</script>";
}

// DATABASE FETCH
$sql = "SELECT places.* 
        FROM plans 
        JOIN places ON plans.place_id = places.id";

$result = mysqli_query($conn, $sql);

// EMPTY CHECK
if(mysqli_num_rows($result) == 0){
    echo "<p style='text-align:center;'>No places selected.</p>";
}
?>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="card">

    <img src="assets/images/<?php echo $row['image']; ?>">

    <div class="card-content">

        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['category']; ?></p>

        <a href="remove_place.php?id=<?php echo $row['id']; ?>" 
           class="btn"
           onclick="return confirm('Remove this place?')">
           Remove
        </a>

    </div>

</div>

<?php } ?>

</body>
</html>