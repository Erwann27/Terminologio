<?php

require_once("../Model/Picture.php");
require_once("../Model/Category.php");

$category = new Category($_GET["category"]);
$pic = new Picture("", "", $category);
$list = $pic -> getProjectsFromCategory($category -> getName());
$result = "<option value='0' selected>Choisir un projet</option>";
for ($i = 0; $i < count($list); $i++) {
    $result .= "<option value = '$i'>" . $list[$i]["title"] . "</option>";
}
echo $result;