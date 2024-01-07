<?php
include('conect.php');
session_start();
require_once 'User.php';

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        header("Location: error.php?error=emptyfields");
        exit();
    } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header("Location: error.php?error=invalidusername");
        exit();
    } elseif ($password !== $confirm_password) {
        header("Location: error.php?error=passwordcheck");
        exit();
    } else {
        $user = new User($username, $password);

        if ($user->isValidUser()) {
            header("Location: error.php?error=userexists");
            exit();
        } else {
            if ($user->registerUser()) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: error.php?error=registrationfailed");
                exit();
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>