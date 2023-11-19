<?php 

namespace MyApp\Router;

class Routers
{
    protected $routes = [];
    protected $controllerAction = null;
    protected $params = null;

    public function addRoute(string $method , string $match , string $controller)
    {
        $this->routes[$method][$match] = $controller;
    }

    public function matchRout()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if(isset($this->routes[$method])){
            foreach($this->routes[$method] as $routUrl=>$controller){
                $regex = preg_replace('/\/(\d+)/','/{id}',$url);
                $regex = str_replace('/','\/',$regex);
                if(preg_match('/'. $regex .'/i',$routUrl)){
                    if(preg_match('/\d+/',$url,$params)){
                        $this->params = $params;
                    }
                    $this->controllerAction = $controller;
                    break;
                }
            }
        }
    }

    public function callController()
    {
        if($this->controllerAction){
            list($controllername,$method) = explode('@',$this->controllerAction);
            $controller = new $controllername;
            call_user_func_array([$controller,$method],[$this->params]);
        }else{
            http_response_code(404);
            echo '404 : Page not found!';
        }
                
    }
}






