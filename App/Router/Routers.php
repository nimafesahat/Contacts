<?php 

namespace MyApp\Router;

use MyApp\Controller\ContactController;

// Url pattern : Localhost/controller/method/params

class Routers
{
    private $controller = 'index';
    private $method = '';
    private $params ;

    public function __construct()
    {
        $this->getUrls();
    }

    public function getUrls()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url,'/');
        $url = explode('/',$url);
        // print_r($url);
        // echo urldecode($url[1]);

        if(isset($url[1])){
            $controller = preg_match('/users|user|eddit|add/i',$url[1]) === 1 ? $url[1] : $this->error();
            $this->controller = $controller;
        }

        if(isset($url[2])){
            $method = preg_match('/index|show|add|delete|edit/i',$url[2]) === 1 ? $url[2] : $this->error();
            $this->method = $method;
        }

        if(isset($url[3])){
            $params = urldecode($url[3]);
            $this->params = $params;
        }
    }

    public function callUrls()
    {
        $callController = new ContactController();
        $controller = $this->controller;
        $method = $this->method;
        $params = $this->params;

        if(isset($method)){
            // Code to call function in controller folder 
            if(isset($params)){
                $params = urldecode($params);
                $params = substr($params , 1 , -2);
                return $params;
            }
        }
    }

    private function error(){
        echo "The page not found : Error 404!";
    }
}