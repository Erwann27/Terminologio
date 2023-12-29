<?php

require_once("../Model/User.php");

User::removeUser($_GET["user"]);