<?php

require_once("../Model/Category.php");

require_once("../Model/Picture.php");
require_once("../Model/Caption.php");

$category = new Category($_GET["cat"]);
$pic = new Picture($_GET["title"], "fr", $category);
$pic_id = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName())[0]["id"];

$caption = new Caption($pic_id);
$new_id = 0;
$array = $caption -> getNextCaptionIdFromPic($caption -> getPicId());
if (count($array) > 0) {
    $new_id = $array[0]["caption_id"];
}
echo $new_id + 1;
