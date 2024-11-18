<?php
namespace App\Core;
//Faz a requisição das paginas através da views
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once "../app/views/$view.php";
    }
}
