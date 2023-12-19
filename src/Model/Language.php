<?php

require_once("Model.php");

class Language extends Model {
    private String $name;

    public function __construct(String $name) {
        $this->name = $name;
        $this->table = "Language";
        $this->getConnection();
    }

    public function getName() : String {
        return $this->name;
    }

    public function getAllLanguages() : array {
        $sql = "SELECT name FROM $this->table";
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCode() : Array {
        $sql = "SELECT code FROM $this->table WHERE name = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$this -> getName()]);
        return $query->fetchAll();
    }
} 

