<!DOCTYPE html>
<html>
<head>
    <title>About</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>

        body{
            margin:0;
            font-family: Arial;
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
        }

        /* NAVBAR */
        .nav{
            background: linear-gradient(90deg, #365563, #1e3a5f);
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav h2{
            color: white;
            margin: 0;
        }

        .nav a{
            color: white;
            text-decoration: none;
            margin: 0 10px;
            padding: 6px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .nav a:hover{
            background: orange;
        }

        /* TITLE */
        .about-title{
            text-align: center;
            margin: 20px;
            color: #365563;
        }

        /* CONTAINER */
        .about-container{
            max-width: 900px;
            margin: auto;
            padding: 20px;
        }

        /* CARDS */
        .about-card{
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
            display: flex;
            align-items: center;
        }

        .about-card:hover{
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.2);
        }

        .icon{
            font-size: 30px;
            margin-right: 15px;
            color: #365563;
            width: 40px;
        }

        .text h3{
            margin: 0;
            color: #365563;
        }

        .text p, .text ul{
            margin: 5px 0 0;
        }

        footer {
    background: #1a252f;
    color: white;
    text-align: center;
    padding: 12px 0;
    font-size: 13px;
    width: 100%;
}

.footer-icons {
    margin-top: 5px;
}

.footer-icons a {
    color: orange;
    margin: 0 8px;
    font-size: 16px;
    text-decoration: none;
}

.footer-icons a:hover {
    color: white;
}

    </style>

</head>

<body>

<div class="nav">
    <h2>Local Tourist Day-Visit Planner</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="places.php">Places</a>
        <a href="planner.php">Planner</a>
        <a href="about.php">About</a>
    </div>
</div>

<h1 class="about-title">About Project</h1>

<div class="about-container">

    <div class="about-card">
        <div class="icon"><i class="fa-solid fa-diagram-project"></i></div>
        <div class="text">
            <h3>Project Name</h3>
            <p>Local Tourist Day Visit Planner</p>
        </div>
    </div>

    <div class="about-card">
        <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
        <div class="text">
            <h3>Purpose</h3>
            <p>To help tourists explore places, view maps, and plan their visits easily.</p>
        </div>
    </div>

    <div class="about-card">
        <div class="icon"><i class="fa-solid fa-star"></i></div>
        <div class="text">
            <h3>Features</h3>
            <ul>
                <li>View tourist places</li>
                <li>Admin management</li>
                <li>Google Maps integration</li>
                <li>Day planning system</li>
            </ul>
        </div>
    </div>

    <div class="about-card">
        <div class="icon"><i class="fa-solid fa-laptop-code"></i></div>
        <div class="text">
            <h3>Technology</h3>
            <p>HTML, CSS, PHP, MySQL</p>
        </div>
    </div>

</div>

<?php include "footer.php"; ?>

</body>
</html>