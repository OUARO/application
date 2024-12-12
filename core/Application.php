<?php
require_once "../core/Controller.php";
require_once('../eonea/controllers/eoneaController.php');
require_once('../eonea/controllers/adminController.php');


    class Application
    {
        public  static function parseurl() 
        {
            if(isset($_GET['url'])){
                $url=explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
            }
            $method="indexAction";
            $controllerName = "eoneaController";
            $controller = new $controllerName();
            $arg=[];
            if(isset($url[0])){
                $met = $url[0].'Action'; 
                if($url[0]=='administration' OR $url[0]=='admin'){
                    $method="indexAction";
                    $controllerName = "adminController";
                    $controller = new $controllerName();
                    if(isset($url[1])) $met=$url[1].'Action';
                    if(isset($url[2])) $arg=[$url[2]];
                }
                
                if(method_exists($controller , $met)){
                    $method = $met;
                }
            }
            call_user_func_array([$controller , $method],$arg);
        }
    }
    
?>