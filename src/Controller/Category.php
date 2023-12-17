<?php

require_once("Model/Category.php");
function printCategories() : String {
    $category = new Category("");
    $list = $category->getAllCategories();
    $result = "<option value='0' selected>Choisir une catégorie</option>";
    for ($i = 0; $i < count($list); $i++) {
        $result .= "<option value = '$i + 1'>" . $list[$i]["name"] . "</option>";
    }
    return $result;
}