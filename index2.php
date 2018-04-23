<?php
namespace MVC;

use MVC\MainController;

class MainController 
{
    public function index()
    {
        $model = new MainModel;

        $data = $model->getData();

        include 'view.php';
    }
}

class MainModel
{
    public function getData()
    {
        return $this->getDataFromDatabase();
    }

    private function getDataFromDatabase()
    {
        return 'Data from MainModel!';
    }
}




//router
$routes = [
        'route' => ['MVC\MainController', 'index'],
    ];

 $route = str_replace('/mysite.loc/mvc/', '' , $_SERVER['REQUEST_URI']); 

if (isset($routes[$route])) {
    $controllerClass = $routes[$route][0];
    $actionName = $routes[$route][1];
} else {
    $controllerClass = 'MVC\MainController';
    $actionName = 'index';
}

$controller = new $controllerClass;
$controller->$actionName();

$ddd = 'routes';
var_dump($$ddd);