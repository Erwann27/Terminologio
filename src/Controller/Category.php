<?php

require_once("Model/Category.php");
function printCategories() : String {
    $category = new Category("");
    $list = $category->getAllCategories();
    $result = "<option value='0' selected>Choisir une catégorie</option>";
    for ($i = 0; $i < count($list); $i++) {
        $value = $i + 1;
        $name = $list[$i]["name"];
        $result .= "<option value = '$value'>" . $name . "</option>";
    }
    return $result;
}