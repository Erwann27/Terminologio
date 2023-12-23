<?php

require_once("../Model/Category.php");
require_once("../Model/Picture.php");
require_once("../Model/Translation.php");

$category = new Category($_GET["cat"]);
$title = $_GET["title"];
$language = $_GET["lang"];
$pic = new Picture($title, "", $category);
$pic_id = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName())[0]["id"];

$cap_id = $_GET["cap_id"];
$text = $_GET["text"];
$translation = new Translation($pic_id, $language, $text);
if (strcmp($text, "") == 0) {
    $text = "Composant".$cap_id;
}
$translation -> updateTranslation($pic_id, $cap_id, $language, $text);