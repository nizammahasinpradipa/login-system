<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexura | Account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
</head>
<body>

    <div class="main <?= isActiveForm('login', $activeForm)?>" id="login">
        <form action="login_register.php" method="post">
            <h1>Nexura | Login</h1>
            <?= showError($errors['login']); ?>
            <div class="input-box">
                <input type="text" placeholder="Username" name="login_input"
                required>
                <i class="bxf bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password"
                required>
                <i class="bxf bx-lock"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">
                    Remember me</label>
                    <a href="">Forgot password?</a>
            </div>

            <button type="submit" class="btn" name="login">
                Login
            </button>

            <div class="register-link">
                <p>Don't have an account?<a href="#" onclick="showForm('register')">Register</a></p>
            </div>
        </form>
    </div>


    <div class="main <?= isActiveForm('register', $activeForm)?>" id="register">
        <form action="login_register.php" method="post">
            <h1>Nexura | Register</h1>
            <?= showError($errors['register']); ?>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email"
                required>
                <i class="bxf bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username"
                required>
                <i class="bxf bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password"
                required>
                <i class="bxf bx-lock"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">
                    Email me news and updates</label>
            </div>

            <button type="submit" class="btn" name="register">
                Register
            </button>

            <div class="register-link">
                <p>Already have an account?<a href="#" onclick="showForm('login')">Login</a></p>
            </div>
        </form>
    </div>


    <script src="script.js"></script>
</body>
</html>