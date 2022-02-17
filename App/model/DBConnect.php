<?php
namespace App\model;
use PDO;
use PDOException;

class DBConnect
{
    public $dsn;
    public $username;
    public $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=inotes;charset=utf8";
        $this->username = "root";
        $this->password = "";
    }

    public function connect()
    {
        try{
            return new PDO($this->dsn, $this->username, $this->password);
            }
        catch (PDOException $error){
            die($error->getMessage());
        }
    }


}