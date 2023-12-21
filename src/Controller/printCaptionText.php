<?php

require_once("../Model/Category.php");
require_once("../Model/Picture.php");
require_once("../Model/Translation.php");

$category = new Category($_GET["cat"]);
$title = $_GET["title"];
$language = $_GET["lang"];
$pic = new Picture($title, "", $category);
$pic_id = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName())[0]["id"];

$translation = new Translation($pic_id, $language, "");
$array = $translation -> getTranslations($translation -> getPicId(), $translation -> getLanguage());
echo json_encode($array);