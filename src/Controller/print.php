<?php

require_once("../Model/Category.php");

require_once("../Model/Picture.php");

$category = new Category($_GET["cat"]);
$pic = new Picture($_GET["title"], "fr", $category);
$list = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName());
$result = "";
if (count($list) != 0) {
    $img = $list[0]["title"];
    $result = "<img src='res/$img' alt='$img' class='img-fluid rounded'>";
}
echo $result;