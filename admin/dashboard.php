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
    <title>Admin Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        /* TOP BAR */
        .topbar {
            background: #1a252f;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h1 {
            margin: 0;
            font-size: 22px;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .add-btn {
            background: #28a745;
        }

        .logout-btn {
            background: #000;
        }

        /* CONTAINER */
        .container {
            padding: 20px;
        }

        /* CARD GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        /* CARD */
        .card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin: 0;
            color: #2c3e50;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        /* ACTION BUTTONS */
        .actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .delete {
            background: #e74c3c;
            padding: 6px 10px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .edit {
            background: #3498db;
            padding: 6px 10px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .delete:hover { background: #c0392b; }
        .edit:hover { background: #2980b9; }

    </style>
</head>

<body>

<!-- TOP BAR -->
<div class="topbar">
    <h1>Admin Dashboard</h1>

    <div>
        <a href="add_place.php" class="btn add-btn">+ Add Place</a>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <div class="grid">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card">

            <h3><?php echo $row['name']; ?></h3>

            <p><b>Category:</b> <?php echo $row['category']; ?></p>

            <p><b>Distance:</b> <?php echo $row['distance']; ?></p>

            <div class="actions">

                <a href="delete_place.php?id=<?php echo $row['id']; ?>" 
                   onclick="return confirm('Are you sure you want to delete this place?')"
                   class="delete">
                   Delete
                </a>

                <a href="edit_place.php?id=<?php echo $row['id']; ?>" 
                   class="edit">
                   Edit
                </a>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>
    