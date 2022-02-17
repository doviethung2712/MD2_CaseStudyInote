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
        include 'App/view/list.php';
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteTypeModel = new NoteTypeModel();
            $noteType = $noteTypeModel->getAll();
            include "App/view/create.php";
        } else {
            $this->noteController->create($_POST);
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
            include "App/view/update.php";
        }else{
            $this->noteController->update($_REQUEST["id"],$_POST);

        }
    }

    public function show()
    {
       $data = $this->noteController->showById($_GET["id"]);
//       var_dump($data);
//       die();
        include "App/view/show.php";

    }
}