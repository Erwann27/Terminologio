<?php

class Caption {

    private String $title;
    private String $language;
    private String $text;
    private int $start_point_X;
    private int $start_point_Y;
    private int $end_point_X;
    private int $end_point_Y;

    public function __construct(String $title, String $language, 
        String $text, int $start_point_X, int $start_point_Y, 
        int $end_point_X, int $end_point_Y) {
            $this->title = $title;
            $this->language = $language;
            $this->text = $text;
            $this->start_point_X = $start_point_X;
            $this->start_point_Y = $start_point_Y;
            $this->end_point_X = $end_point_X;
            $this->end_point_Y = $end_point_Y;
    }

    public function getTitle(): String {
        return $this->title;
    }

    public function getLanguage(): String {
        return $this->language;
    }

    public function getText(): String {
        return $this->text;
    }

    public function getStartPointX(): int {
        return $this->start_point_X;
    }

    public function getStartPointY(): int {
        return $this->start_point_Y;
    }

    public function getEndPointX(): int {
        return $this->end_point_X;
    }

    public function getEndPointY(): int {
        return $this->end_point_Y;
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
        $this->start_point_X = $start_point_X;
    }

    public function setStartPointY(int $start_point_Y): void {
        $this->start_point_Y = $start_point_Y;
    }

    public function setEndPointX(int $end_point_X): void {
        $this->end_point_X = $end_point_X;
    }

    public function setEndPointY(int $end_point_Y): void {
        $this->end_point_Y = $end_point_Y;
    }
}