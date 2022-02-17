<?php

namespace App\model;

class NoteTypeModel
{
    public $connect;

    public function __construct()
    {
        $db = new DBConnect();
        $this->connect = $db->connect();
    }

    public function getAll()
    {
        $sql = "select * from note_type";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function createNoteType($data)
    {
        $sql = "INSERT INTO note_type ( name , description )  VALUES (?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["description"]);
        $stmt->execute();
    }

    public function updateNoteType($id , $data)
    {
        $sql = "update note_type set name = ? where id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
//        $stmt->bindParam(2, $data["description"]);
        $stmt->bindParam(2, $id);
        $stmt->execute();
        header("location:index.php?page=note-list");
    }
    public function getById($id)
    {
        $sql = "select * from note_type where id = $id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

}