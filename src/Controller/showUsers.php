<?php
require_once("Model/User.php");

function getUsersList() {
    $list = User::getAllUsers();    
    return $list;
}
