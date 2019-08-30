<?php

namespace Maiconfss\Router;

class Router
{   
    public $router;
    public $route;
    public $handler;
    public $group;
    public $method;
    public $setUrl;
    public $setError;
    
    public function setUrl(){
        $this->setUrl = true;
    }

    public function setError(){
        $this->setError = true;
    }
    
    public function route(string $route = null,string $handler = null, string $group = null, string $method = null)
    {   
        $url = isset($_GET['route']) ? explode('/',$_GET['route'])[1] : '/';
        $url = trim(strtolower($url));
        $url = $url == 'index' ? '/' : $url;
        if(!$this->setUrl){
            if(($url == $route) ){
                $this->setUrl();
                $this->path($route,$handler,$group,$method);
            }elseif((strtolower($url) == ERROR_NAME)){
                $this->setError();
                $this->path($route,$handler,$group,$method);
            }
        }
    }
    
    public function path(string $route = null,string $handler = null, string $group = null, string $method = null)
    {   
        $this->path = [
                    "route" => $route,
                    "handler" => $handler,
                    "group" => $group,
                    "method" => $method
            ];
        return $this->path;
    }
    
    public function error(string $route = null,string $handler = null, string $group = null, string $method = null)
    {   
        $this->error = [
            "route" => $route,
            "handler" => $handler,
            "group" => $group,
            "method" => $method
            ];
        return $this->error;
    } 
    
    public function redirect(string $route = null, string $errcode = null)
    {   
        $errcode = (substr($errcode, 0,1) == "/" ? substr($errcode, 1) : $errcode);
        header("Location: ".PATH_APP."/$route/{$errcode}");
        exit;
    } 

    public function dispatch()
    {   
        if(isset($this->path)){
            if(file_exists("App/View/pages/{$this->path['handler']}.php")){
                include "App/View/pages/{$this->path['handler']}.php";
            }else{
                include "App/View/pages/404.php";
                echo 'View não encontrada';
            }
        }else{
            $this->redirect(ERROR_NAME,$_GET['route']);
        }
    }
}