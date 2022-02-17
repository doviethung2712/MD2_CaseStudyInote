<?php

namespace App\controller;

use App\model\NoteTypeModel;

class NoteTypeController
{
public $noteTypeController;
public function __construct()
{
    $this->noteTypeController = new NoteTypeModel();
}

    public function createNoteType()
    {
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
            include "App/view/note_type/create.php";
        }else{
        $this->noteTypeController->createNoteType($_POST);
            header("location:index.php?page=note-list");
        }
}

    public function updateNoteType()
    {
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
           $data = $this->noteTypeController->getById($_GET["id"]);
            include "App/view/note_type/update.php";
        }else{
            $this->noteTypeController->updateNoteType($_REQUEST["id"],$_POST);
            header("location:index.php?page=note-list");
        }
    }


}