<?php

require_once("Model/Language.php");
function printLanguages() : String {
    $language = new Language("");
    $list = $language->getAllLanguages();
    $result = "";
    for ($i = 0; $i < count($list); $i++) {
        $name = $list[$i]["name"];
        $result .= "<option value = '$name'>" . $name . "</option>";
    }
    return $result;
}