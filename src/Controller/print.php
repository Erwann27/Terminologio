<?php

require_once("../Model/Category.php");

require_once("../Model/Picture.php");

$category = new Category($_GET["cat"]);
$pic = new Picture($_GET["title"], "fr", $category);
$list = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName());
$result = "<svg xmlns='http://www.w3.org/2000/svg' id='svg' viewBow='0 0 100 100'></svg>";
if (count($list) != 0) {
    $img = $list[0]["title"];
    $path = "res/" . $category->getName() . "/" . $img;
    $result .= "<img src='$path' alt='$img' id='img' class='img-fluid rounded'>";
}
echo $result;