<?php
require_once __DIR__ . "/Config/Database.php";
require_once __DIR__ . "/Model/Todolist.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/Util/Helper.php";
require_once __DIR__ . "/View/TodolistView.php";

use Config\Database;
use Model\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use Util\Helper;
use View\TodolistView;

$conn = Database::getConnect();

$repo = new TodolistRepositoryImpl($conn);
$serv = new TodolistServiceImpl($repo);
$view = new TodolistView($serv);

$view->showTodoList();
?>