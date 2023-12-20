<?php
session_start();
require_once("../Model/User.php");

if (isset($_POST["username"]) && isset($_POST["pwd"]) && isset($_POST["conf-pwd"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $confPwd = $_POST["conf-pwd"];

    // vérification identités des mdp ET utilisateur non inscrit
    if (strcmp($password, $confPwd) != 0) {
        header("Location:../register.php");
    }

    $user = new User($username, $password);
    $result = $user->getByUsername($username);
    if (count($result) == 1) {
        $_SESSION["register_error"] = 1;
        header("Location:../register.php");
    } else {
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        $user->setPassword($hashed_pwd);
        $user->insertUser($user->getUsername(), $user->getPassword());
        $_SESSION["username"] = $user->getUsername();
        header("Location:../index.php");
    }
}