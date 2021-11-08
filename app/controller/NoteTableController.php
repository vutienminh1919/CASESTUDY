<?php

namespace App\controller;

use App\model\NoteTableModel;

class NoteTableController
{
    private $noteTableModel;

    public function __construct()
    {
        $this->noteTableModel = new NoteTableModel();

    }

    public function index()
    {
        $noteTables = $this->noteTableModel->getAll();
        include_once "app/view/noteTables.php";
    }
}