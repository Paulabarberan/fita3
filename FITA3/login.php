<?php
include('conect.php');
session_start();
require_once 'User.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: error.php?error=emptyfields");
        exit();
    } else {
        $user = new User($username, $password);

        if ($user->isValidUser()) {
            if ($user->isValidPasswd($password)) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: error.php?error=wrongpassword");
                exit();
            }
        } else {
            header("Location: error.php?error=usernotfound");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>