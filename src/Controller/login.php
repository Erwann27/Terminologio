<?php

require_once("../Model/User.php");

if (isset($_POST["username"]) && isset($_POST["pwd"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $user = new User($username, $password);
    $result = $user->getByUsername($username);
    
    if (count($result) == 1)  {
        if(password_verify($password, $result[0]["password"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["username"] = $user->getUsername();
            header("Location:../index.php");
        } else {
          header("Location:../login.php");    
        }
    } else {
        header("Location:../login.php");
    }
}