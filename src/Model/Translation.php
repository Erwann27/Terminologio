<?php
require_once("Model.php");
class Translation extends Model {

    private int $pic_id;

    private int $caption_id;
    private String $language;

    private String $text;

    public function __construct(int $pic_id, String $language, String $text) {
        $this->language = $language;
        $this->pic_id = $pic_id;
        $this->text = $text;
        $this->table = "Translation";
        $this->getConnection();
    }

    public function getPicId(): int {
        return $this->pic_id;
    }
    public function getCaptionId(): int {
        return $this->caption_id;
    }

    public function getLanguage(): String {
        return $this->language;
    }

    public function getText(): String {
        return $this->text;
    }

    public function insertTranslation(int $pic_id, int $caption_id, String $language, String $text):void { 
        $sql = "INSERT INTO $this->table VALUES (?, ?, ?, ?)";
        $query = $this->connexion->prepare($sql);
        $query->execute([$pic_id, $caption_id, $language, $text]);
    }

    public function getTranslations(int $pic_id, String $language):array {
        $sql = "SELECT caption_id, text FROM $this->table WHERE pic_id = ? AND language = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$pic_id, $language]);
        return $query->fetchAll();
    }
}