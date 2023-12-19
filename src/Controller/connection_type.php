<?php
session_start();


if (isset($_POST["connection_selection"])) {
    if($_POST["connection_selection"] == 1){
        $_SESSION["is_admin"] = true;
    }
    header("Location:../index.php");
}