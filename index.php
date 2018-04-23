<?php

//---контроллер-----------

class MainController 
{
    public function home()
    {
       include 'home.php'; 
    }

     public function about()
    {
        $model = new TeamMemberModel;     //создать
        $data = $model->getData();  // у модели взяли данные
        include 'about.php'; //
    }
}

//---модель------------------------

abstract class MainModel 
{
	public function getData()       //эта ф-я возвращает  данные getNews или getArticel getTitle, getContent
    {
        return $this->getDataFromDatebase();
    }
}

class TeamMemberModel extends MainModel
{
    private function getDataFromDatebase()
    {
        return [
        	['name' => 'Jong Smngnk', 'job' => 'designer', 'photo' => 'poto1.jpeg'],
           	['name' => 'Julia s', 'job' => 'designer', 'photo' => 'poto1.jpeg'],
        ];
    }

}


//---router------------------------

$routs = [
'/home' => ['MainController', 'home'],
'/about' => ['MainController', 'about'],
'/' => ['MainController', 'home'],
];
var_dump($_SERVER['REQUEST_URI']);
$route = str_replace('/		index.php', '' , $_SERVER['REQUEST_URI']); 

if (isset($routs[$route])) {
    $controller = $routs[$route][0];
    $action = $routs[$route][1];
    /*list($class, $action) = explode(':', $route->getController(), 2);
    $class = 'Controller\\' . $class . 'Controller';
    call_user_func_array(array(new $class(), $action), $route->getParameters());
    */
    $controller = new $controller;// строку с именем класса сделали объектом 
    //если есть переменная, кот содержит имя класса или другой переменной, то к ней можно обратиться создав из нее объект
    $controller->{$action}(); 

} else {
	echo 'NOT FOUND';
}


