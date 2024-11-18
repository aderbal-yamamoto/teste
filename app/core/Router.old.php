<?php
namespace App\Core;

use App\Controllers\HomeController;

class Router {
    public function route($request) {
      //Tudo isso não precisa ser passado na router verificar onde fica melhor
        if (isset($url[4])){
            //este será o parametro caso seja passado
            $param = $url[4];
        }
        $url = explode('/', $request);
        $controlador = $url[2] = isset($url[2]) ? $url[2]:'';
        $method  = $url[3] = isset($url[3])?$url[3] : 'index'; 

        switch ($controlador) {
            case '':
                $controller = 'HomeController';
               
                break;
            case 'sobre':
                $controller = 'AboutController';
                           break;
            case 'db':
                $controller = 'DbController';
               
            break;      
            
            default:
            $controller = 'Error';
            
                break;
        }

       

        $controllerClass = "App\\Controllers\\$controller";
        //echo $controllerClass;
        
        if (!class_exists($controllerClass)){
            http_response_code(404);
            echo '404 não encontrado';
        }
        
        $controllerInstance = new $controllerClass();
        if(!method_exists($controllerInstance, $method)){
            
            http_response_code(404);
            echo '404 não encontrado';
        }
           
          //echo $method;
            $controllerInstance->$method($param);
            
        
        
        
    }
}
