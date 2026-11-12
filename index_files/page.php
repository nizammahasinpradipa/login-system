<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexura | Main</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .user-page {
            color: white;
        }
        h1 {
            font-size: 50px;
        }
        span {
            color: #7ee787;
        }
        .box p {
            font-size: 22px;
            text-align: center;
        }
        .box button{
            display: block;
            width: 300px;
            height:50px;
            margin: 0 auto;
            background-color: #1c2129;
            color: #fff;
            border: none;
            border-radius:14.5px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body class="user-page">
    <div class="box">
    <h1 class="page">Welcome, <span class="user"><?= htmlspecialchars($_SESSION['username']); ?></span></h1>
    <p> This is <span>your</span> page</p>
    <button onclick="window.location.href='logout.php'">Logout</button>
</div>
</body>
</html>