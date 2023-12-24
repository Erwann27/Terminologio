<?php

require_once("Model.php");
class Picture extends Model {
    private String $title;
    private String $default_language;
    private Category $category;

    public function __construct(String $title, 
      String $default_language, Category $category) {
            $this->title = $title;
            $this->default_language = $default_language;
            $this->category = $category;
            $this->table = "Picture";
            $this->getConnection();
    }

    public function getTitle(): String {
        return $this->title;
    }

    public function getDefaultLanguage(): String {
        return $this->default_language;
    }

    public function getCategory(): Category {
        return $this->category;
    }

    public function setTitle(String $title): void {
        $this->title = $title;
    }

    public function setDefaultLanguage(String $default_language): void {
        $this->default_language = $default_language;
    }

    public function setCategory(Category $category): void {
        $this->category = $category;
    }

    public function getProjectsFromCategory(String $category): array { 
        $sql = "SELECT * FROM $this->table WHERE category = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$category]);
        return $query->fetchAll();
    }

    public function getProjectsFromTitleAndCategory(String $title, String $category): array {
        $sql = "SELECT * FROM $this->table WHERE title = ? AND category = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$title, $category]);
        return $query->fetchAll();
    }

    public function insertPic(String $title, String $language, String $category) {
        $sql = "INSERT INTO $this->table (title, default_language, category) VALUES(?, ?, ?)";
        $query = $this->connexion->prepare($sql);
        $query->execute([$title, $language, $category]);
        return $query->fetchAll();
    }

    public function getLanguageFromTitleAndCategory (String $title, String $category): array {
        $sql = "SELECT default_language FROM $this->table WHERE title = ? AND category = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$title, $category]);
        return $query->fetchAll();
    }
}