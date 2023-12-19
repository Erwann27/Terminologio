<?php

require_once("Model/Category.php");
function printCategories(bool $bool) : String {
    $category = new Category("");
    $list = $category->getAllCategories();
    $result = "";
    if ($bool) {
        $result .= "<option value='0' selected>Choisir une catégorie</option>";
    }
    for ($i = 0; $i < count($list); $i++) {
        $name = $list[$i]["name"];
        $result .= "<option value = '$name'>" . $name . "</option>";
    }
    return $result;
}