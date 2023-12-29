<?php

require_once("Model.php");

class Caption extends Model {

    private int $pic_id;

    private String $title;
    private String $text;
    private int $point_X;
    private int $point_Y;

    public function __construct(int $pic_id) {
        $this->pic_id = $pic_id;
        $this->table = "Caption";
        $this->getConnection();
    }

    public function getTitle(): String {
        return $this->title;
    }

    public function getPicId(): String {
        return $this->pic_id;
    }

    public function getText(): String {
        return $this->text;
    }

    public function getStartPointX(): int {
        return $this->point_X;
    }

    public function getStartPointY(): int {
        return $this->point_Y;
    }


    public function setTitle(String $title): void {
        $this->title = $title;
    }

    public function setLanguage(String $language): void {
        $this->language = $language;
    }

    public function setText(String $text): void {
        $this->text = $text;
    }

    public function setStartPointX(int $start_point_X): void {
        $this->pointX = $start_point_X;
    }

    public function setStartPointY(int $start_point_Y): void {
        $this->pointY = $start_point_Y;
    }

    public function getNextCaptionIdFromPic (int $pic_id): array {
        $sql = "SELECT caption_id FROM $this->table WHERE pic_id = ? ORDER BY caption_id DESC LIMIT 1";
        $query = $this->connexion->prepare($sql);
        $query->execute([$pic_id]);
        return $query->fetchAll();
    }

    public function insert(int $pic_id, int $cap_id, float $x, float $y): array {
        $sql = "INSERT INTO $this->table VALUES (?, ?, ?, ?)";
        $query = $this->connexion->prepare($sql);
        $query->execute([$pic_id, $cap_id, $x, $y]);   
        return $query->fetchAll();
    }

    public function getCaptions(int $pic_id): array {
        $sql = "SELECT caption_id, point_X, point_Y FROM $this->table WHERE pic_id =  ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$pic_id]);
        return $query->fetchAll();
    }

    public function removeCaption(int $pic_id, int $cap_id){
        $sql = "DELETE FROM $this->table WHERE pic_id =  ? AND caption_id = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$pic_id, $cap_id]);
    }
}