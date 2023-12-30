<?php

require_once("../Model/User.php");
$user = new User("", "");
$user->removeUser($_GET["user"]);