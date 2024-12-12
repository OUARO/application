<?php 
  require_once __DIR__.'../../vendor/autoload.php';
    global $db;require_once "../core/Database.php";
    require_once "../core/Application.php";
    $db=new Database(); 
    $db::connect(); 
    Application::parseurl();
    
?>
