<?php
abstract class Model{
    private $host = "database";
    private $db_name = "main";
    private $username = "root";
    private $password = "password";

    protected $connexion;

    public $table;
    public $id;

    public function getConnection(){
        $this->connexion = null;

        try{
            $this->connexion = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }   
}