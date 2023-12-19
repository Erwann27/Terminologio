<?php


if (isset($_POST["connection_selection"])) {
    if($_POST["connection_selection"] == 1){
        $_SESSION["is_admin"] = 1;
    }
    header("Location:../index.php");
}