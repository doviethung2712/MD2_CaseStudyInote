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
        $sql = "select note.id as id, note.title as title, note.content as content, note.type_id as type_id, note_type.name as notename from note 
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


}