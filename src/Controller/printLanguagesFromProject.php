<?php

require_once("../Model/Category.php");

require_once("../Model/Picture.php");
require_once("../Model/Translation.php");

$category = new Category($_GET["cat"]);
$pic = new Picture($_GET["title"], "", $category);
$default = $pic -> getLanguageFromTitleAndCategory($pic -> getTitle(), $pic -> getCategory() -> getName())[0][0];
$result = "<option value ='0' selected>" . $default . "</option>";
$pic_id = $pic -> getProjectsFromTitleAndCategory($pic -> getTitle(), $category -> getName())[0]["id"];

$translation = new Translation($pic_id, "", "");

$list = $translation -> getAllLanguagesFromPicture($default);
for ($i = 0; $i < count($list); $i++) {
    $result .= "<option value = '$i'>" . $list[$i][0] . "</option>";
}
echo $result;