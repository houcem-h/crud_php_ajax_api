<?php
/**
 * Created by PhpStorm.
 * User: Houcem
 * Date: 24/02/2017
 * Time: 12:06
 */
class Database{
    private $dbname = 'gestioncb';
    private $dbuser = 'root';
    private $dbpwd = '';
    private $dbhost = 'localhost';
    public $conn;

    public function connectDB(){
        $this->conn = null;
        try{
            $this->conn = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname,$this->dbuser,$this->dbpwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //permet d'afficher les erreurs si ça existe
        }
        catch (PDOException $exception){
            echo "Erreur de connexion: ".$exception->getMessage();
        }
        return $this->conn;
    }
}
?>
