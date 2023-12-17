<?php

require_once("Model.php");

class Category extends Model {
    private String $name;

    public function __construct(String $name) {
        $this->name = $name;
        $this->table = "User";
        $this->getConnection();
    }

    public function getAllCategories() : array {
        $sql = "SELECT name FROM Category ORDER BY name";
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
} 

