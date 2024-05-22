<?php
class Database
{
 
private static $instance = null;
private $conn;
private $host = 'localhost';
private $db = 'contatos';
private $user = 'root';
private $pass = '';
 
private function __constructor()
{
    try
    {
        $this->conn = new PDD("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPETION);
    } catch (PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
    }
 
}
 
// Sigleton Desing Patternshttps:
// https:refactoring.guru/design-patterns/singleton
public static function getInstance()
{
    if(!self::$instance)
    {
        self::$instance = new Database();
    }
    return self::$instance;
}
 public function __ getConection() {
    return $this->conn;
 }
}
?>