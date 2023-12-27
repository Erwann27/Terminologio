<?php
require_once("../Model/Language.php");
require_once("../Model/Category.php");
require_once("../Model/Picture.php");

if (isset($_POST["title"]) && isset($_POST["select-language"]) && isset($_POST["category-selection"]) && isset($_FILES["pic"])) {
    $title = $_POST["title"];
    $select_language = $_POST["select-language"];
    $select_category = $_POST["category-selection"];
    $image = $_FILES["pic"]["tmp_name"];
    $language = new Language($select_language);
    $result = $language -> getCode();
    $code = $result[0]["code"];
    $category = new Category($select_category);
    $pic = new Picture ($title, $code, $category);
    $pic->insertPic($pic -> getTitle(), $pic -> getDefaultLanguage(), $pic -> getCategory() -> getName());
    if (!is_dir("../res/" . $category -> getName())) {
        mkdir("../res/". $category -> getName(), 0777);
    }
    $path = "../res/". $category -> getName() . '/' . $title;
    move_uploaded_file($image, $path);
    header("Location:../index.php");
}