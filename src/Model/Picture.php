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
}