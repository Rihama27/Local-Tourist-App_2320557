<?php
include "config/db.php";
if(isset($_GET['msg']) && $_GET['msg'] == "added"){
    echo "<script>alert('This place is selected');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tourist Places</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        /* HEADER NAV */
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

        /* TITLE */
        .page-title {
            text-align: center;
            margin: 20px 0;
            color: #2c3e50;
        }

        /* GRID */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        /* CARD */
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-6px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h3 {
            margin: 0;
            color: #2c3e50;
        }

        .small-text {
            font-size: 13px;
            color: gray;
            margin: 5px 0 10px;
        }

        /* BUTTONS */
        .btn {
            display: inline-block;
            padding: 8px 12px;
            background: orange;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn:hover {
            background: darkorange;
        }

        .select-btn {
            display: inline-block;
            padding: 8px 12px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
            margin-top: 8px;
        }

        .select-btn:hover {
            background: #218838;
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
        <a href="about.php">About</a>
    </div>
</div>

<h1 class="page-title">Tourist Places</h1>

<form method="GET" style="text-align:center; margin-bottom:20px;">

    <input type="text" name="search"
        placeholder="Search places..."
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
        style="padding:10px; width:200px; border-radius:8px; border:1px solid #ccc;">

    <select name="category" style="padding:10px; border-radius:8px;">
        <option value="all">All Categories</option>
        <option value="beach">Beach</option>
        <option value="Religious">Religious</option>
        <option value="park">Park</option>
        <option value="historical">Historical</option>
        <option value="Landmark">Landmark</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Museum">Museum</option>
    </select>

    <button type="submit"
        style="padding:10px 15px; background:orange; color:white; border:none; border-radius:8px;">
        Search
    </button>

</form>

<div class="container">

<?php
// $sql = "SELECT * FROM places";
// $result = mysqli_query($conn, $sql);

$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$sql = "SELECT * FROM places WHERE 1=1";

if (!empty($search)) {
    $sql .= " AND name LIKE '%$search%'";
}

if ($category != "all") {
    $sql .= " AND category = '$category'";
}

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

        <a class="select-btn" href="select_place.php?id=<?php echo $row['id']; ?>">
            Select
        </a>
        

    </div>

</div>

<?php } ?>

</div>

</body>
</html>