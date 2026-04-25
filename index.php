<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Planner</title>
<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

/* HEADER */
header {
    background: #1a252f;
    padding: 15px 0;
    text-align: center;
}

/* HEADER TITLE */
header h2 {
    margin: 0;
    color: white;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
}

/* RESET */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

/* NAVBAR */
nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #2c3e50;
    padding: 15px 30px;
    
}

/* Center links */
.nav-links {
    flex: 1;
    display: flex;
    justify-content: center;
    gap: 80px;
    margin-left: 100px; /* small right shift */
}

/* Links style */
.nav-links a {
    color: white;
    margin: 0 12px;
    text-decoration: none;
    font-weight: bold;
}

.nav-links a:hover {
    color: orange;
}

/* Button */
.btn {
    padding: 10px 16px;
    background: orange;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
    white-space: nowrap;
    
}

.btn:hover {
    background: darkorange;
}

/* HERO */
.hero {
    height: calc(100vh - 120px); /* adjusts full screen minus header/nav */
    
    background-image: url('assets/images/batticaloa.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    text-align: center;
    color: white;

    position: relative;   /* IMPORTANT */
}

.hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5); /* dark layer */
}

.hero * {
    position: relative;
    z-index: 1;
}

</style>

</head>

<body>

<header>
    <h2>Local Tourist Day-Visit Planner</h2>
</header>

<!-- <nav>
    <a href="index.php">Home</a>
    <a href="places.php">Places</a>
    <a href="planner.php">Planner</a>
    <a href="about.php">About</a>
    <a href="admin/login.php"
    class="btn">Admin Login</a>
</nav> -->

<nav>
    <div class="nav-left"></div>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="places.php">Places</a>
        <a href="planner.php">Planner</a>
        <a href="about.php">About</a>
    </div>

    <a href="admin/login.php" class="btn">Admin Login</a>
</nav>



<div class="hero">

    <h1>Plan Your Perfect Day in Batticaloa</h1>
    <p>Discover places, view maps, and organize your visit easily.</p>
    <a href="places.php" class="btn">Explore Places</a>
</div>

</body>
</html>