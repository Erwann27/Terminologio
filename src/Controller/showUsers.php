<?php
require_once("Model/User.php");

function getUsersList() {
    $user = new User("", "");
    $list = $user -> getAllUsers();    
    return $list;
}
