<?php
session_start();
include "../config/db.php";

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a252f, #2c3e50);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            width: 320px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            text-align: center;
            color: white;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-size: 26px;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            outline: none;
            box-sizing: border-box; /* IMPORTANT */
        }

        .login-box button {
            width: 60%;
            padding: 12px;
            background: orange;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;

            display: block;          /* important for centering */
            margin: 15px auto 0; 
        }

        .login-box button:hover {
            background: darkorange;
        }

        .error {
            color: #ff4d4d;
            margin-top: 10px;
        }
        /* HOME BUTTON */
        .home-btn{
            position: absolute;
            top: 15px;
            right: 20px;
            background: orange;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .home-btn:hover{
            background: orange;
            color: black;
        }
    </style>
</head>

<body>
    <a href="../index.php" class="home-btn">Home</a>

<div class="login-box">
    <h2>Admin Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>