<?php
namespace App\Core;

use App\Controllers\HomeController;

class Router {
    
    // Método principal que lida com o roteamento
    public function route($request) {
       
        // Passa a URL por '/' e captura os valores relevantes
        $url = explode('/', trim($request, '/'));
        
        
        // Atribui valores padrão se os índices não existirem
        $controlador = isset($url[2]) ? $url[2] : 'home';  // Controlador padrão é 'home'
        $method = isset($url[3]) ? $url[3] : 'index';       // Método padrão é 'index'
        $param = isset($url[4]) ? $url[4] : null;            // O parâmetro (opcional)
        
        // Mapeia os controladores possíveis para as classes corretas
        $controller = $this->getController($controlador);
     

        // Verifica se a classe existe
        $controllerClass = "App\\Controllers\\$controller";
        
        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo '404 - Controlador não encontrado';
            return;
        }

        // Instancia o controlador
        $controllerInstance = new $controllerClass();
        
        // Verifica se o método existe na classe
        if (!method_exists($controllerInstance, $method)) {
            http_response_code(404);
            echo '404 - Método não encontrado';
            return;
        }

        // Chama o método no controlador passando o parâmetro (se houver)
        $controllerInstance->$method($param);
    }

    // Mapeia o nome do controlador para a classe correspondente
    private function getController($controlador) {
        $controllers = [
            'home' => 'HomeController',
            'sobre' => 'AboutController',
            'db' => 'DbController',
            'login' => 'loginController',
            'user' => 'UserController',
            // Adicione outros controladores aqui, se necessário
        ];

        // Se o controlador não estiver mapeado, chama 'ErrorController'
        return isset($controllers[$controlador]) ? $controllers[$controlador] : 'ErrorController';
    }
}
