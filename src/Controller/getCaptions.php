<?php

require_once("../Model/Category.php");
require_once("../Model/Picture.php");
require_once("../Model/Caption.php");

$category = new Category($_GET["cat"]);
$title = $_GET["title"];
$pic = new Picture($title, "", $category);
$pic_id = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName())[0]["id"];

$caption = new Caption($pic_id);
$array = $caption -> getCaptions($caption -> getPicId());
echo json_encode($array);