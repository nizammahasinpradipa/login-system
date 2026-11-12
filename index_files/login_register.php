<?php

session_start();
require_once 'config.php';

// Gunakan $_POST (bukan $POST)
if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    } else {
        $conn->query("INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')");
        $_SESSION['active_form'] = 'login';
    }

    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $login_input = $_POST['login_input'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$login_input' OR name = '$login_input'");
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header("Location: page.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect username/email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}

?>