<?php

namespace App\model;

class NoteModel
{

    public $connect;

    public function __construct()
    {
        $db = new DBConnect();
        $this->connect = $db->connect();
    }

    public function getAll()
    {
        $sql = "select note.id as id, note.title as title, note.content as content, 
                note.type_id as type_id, note_type.name as notename , note_type.id as idnotetype from note 
                join note_type on note.type_id = note_type.id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function create($data)
    {
        $sql = "INSERT INTO note (title,content,type_id) VALUES (?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data['title']);
        $stmt->bindParam(2, $data['content']);
        $stmt->bindParam(3, $data['type_id']);
        $stmt->execute();
        header("location:index.php?page=note-list");
    }

    public function delete($id)
    {
        $sql = "delete from note where id = $id";
        $this->connect->query($sql);
    }

    public function update($id, $data)
    {
        $sql = "update note set  title = ?,content =?,type_id =? where id = ?";
        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam(1, $data["title"]);
        $stmt->bindParam(2, $data["content"]);
        $stmt->bindParam(3, $data["type_id"]);
        $stmt->bindParam(4, $id);
        $stmt->execute();
        header("location:index.php?page=note-list");
    }

    public function getById($id)
    {
        $sql = "select * from note where id = $id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function showById($id)
    {
        $sql = "select note.id as id, note.title as title, note.content as content, 
                note.type_id as type_id, note_type.name as notename from note
                 join note_type on note.type_id = note_type.id where note.id = $id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetch(\PDO::FETCH_OBJ);

    }


}