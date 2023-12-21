<?php

require_once("../Model/Category.php");

require_once("../Model/Picture.php");
require_once("../Model/Caption.php");
require_once("../Model/Translation.php");
require_once("../Model/Language.php");

$category = new Category($_GET["cat"]);
$x = $_GET["x"];
$y = $_GET["y"];
$desc = $_GET["text"];

$language = $_GET["lang"];

$pic = new Picture($_GET["title"], $language, $category);
$pic_id = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName())[0]["id"];

$caption = new Caption($pic_id);
$new_id = 0;
$array = $caption -> getNextCaptionIdFromPic($caption -> getPicId());
if (count($array) > 0) {
    $new_id = $array[0]["caption_id"];
}
++$new_id;
$caption -> insert($pic_id, $new_id, $x, $y);

$translation = new Translation($pic_id, $language, $desc);
$text = $translation -> getText();
if (strcmp("", $text) == 0) {
    $text = "Composant".$new_id;
}
$translation -> insertTranslation($translation->getPicId(), $new_id, $language, $text);
echo $new_id;
