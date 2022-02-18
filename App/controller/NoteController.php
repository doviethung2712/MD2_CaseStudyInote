<?php

namespace App\controller;

use App\model\NoteModel;
use App\model\NoteTypeModel;

class NoteController
{
    public $noteController;

    public function __construct()
    {
        $this->noteController = new NoteModel();
    }

    public function getAll()
    {
        $datas = $this->noteController->getAll();
//        var_dump($datas);
//        die();
        include 'App/view/note/list.php';
    }

    public function create($request)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteTypeModel = new NoteTypeModel();
            $noteType = $noteTypeModel->getAll();
            include "App/view/note/create.php";
        } else {
            $request["image"] = $this->uploadImage();
//            var_dump($request);
//            die();
            $this->noteController->create($request);

            header("location:index.php?page=note-list");
        }
    }

    public function delete()
    {
        $this->noteController->delete($_REQUEST["id"]);
        header("location:index.php?page=note-list");
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $note = new NoteModel();
            $noteTypeModel = new NoteTypeModel();
            $noteType = $noteTypeModel->getAll();
            $data = $note->getById($_GET["id"]);
            include "App/view/note/update.php";
        } else {
            $this->noteController->update($_REQUEST["id"], $_POST);

        }
    }
    public function uploadImage($name = "giai-nen-file-img.jpg")
    {
        $target_dir = "uploads/";
        $target_file = $target_dir .time() . basename($_FILES["image"]["name"]);
        $default = $target_dir.$name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return $default;
        }
    }

    public function show()
    {
        $data = $this->noteController->showById($_GET["id"]);
        include "App/view/note/show.php";
    }
}