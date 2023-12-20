<?php
session_start();

require_once("../Model/User.php");

if (isset($_POST["username"]) && isset($_POST["pwd"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $user = new User($username, $password);
    $result = $user->getByUsername($username);

    if (count($result) == 1) {
        if (password_verify($password, $result[0]["password"])) {
            session_regenerate_id();
            $_SESSION["username"] = $user->getUsername();
            if ($result[0]["is_admin"] == 1) {
                header("Location:../connection_type.php");
            } else {
                header("Location:../index.php");
            }
        } else {
            $_SESSION["login_error"] = 1;
            header("Location:../login.php");
        }
    } else {
        $_SESSION["login_error"] = 1;
        header("Location:../login.php");
    }
}