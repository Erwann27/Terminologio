<?php
require_once("Model.php");
class User extends Model {

    private String $username;
    private String $password;

    public function __construct(String $username, String $password) {
        $this->username = $username;
        $this->password = $password;
        $this->table = "User";
        $this->getConnection();
    }

    public function getUsername():String {
        return $this->username;
    }

    public function getPassword():String { 
        return $this->password;
    }

    public function setUsername(String $username):void {
        $this->username = $username;
    }

    public function setPassword(String $password):void {
        $this->password = $password;
    }

    public function getByUsername(String $username):Array { 
        $sql = "SELECT * FROM ".$this->table." WHERE `username`= ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$username]);
        return $query->fetchAll();
    }

    public function insertUser(String $username, String $password):void { 
        $sql = "INSERT INTO $this->table VALUES (?, ?, false)";
        $query = $this->connexion->prepare($sql);
        $query->execute([$username, $password]);
    }

    public static function getAllUsers():Array {
        $sql = "SELECT username FROM User";
        $connexion = new PDO("mysql:host=database;dbname=main", "root", "password");
        $query = $connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function removeUser(String $username):void{
        $sql = "DELETE FROM User WHERE `username` = ?";
        $connexion = new PDO("mysql:host=database;dbname=main", "root", "password");
        $query = $connexion->prepare($sql);
        $query->execute([$username]);
    }
}