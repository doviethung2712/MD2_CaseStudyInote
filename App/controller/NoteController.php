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
        include 'App/view/list.php';
    }

    public function create($request)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteTypeModel = new NoteTypeModel();
            $noteType = $noteTypeModel->getAll();
            include "App/view/create.php";
        } else {
            $this->noteController->create($_POST);
        }
    }

}