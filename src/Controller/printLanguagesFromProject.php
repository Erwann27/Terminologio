<?php

require_once("../Model/Category.php");

require_once("../Model/Picture.php");

$category = new Category($_GET["cat"]);
$pic = new Picture($_GET["title"], "fr", $category);
$list = $pic -> getLanguagesFromTitleAndCategory($pic -> getTitle(), $category -> getName());
$result = "";
for ($i = 0; $i < count($list); $i++) {
    $result .= "<option value = '$i'>" . $list[$i][0] . "</option>";
}
echo $result;