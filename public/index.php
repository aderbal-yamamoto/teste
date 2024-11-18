<?php
require_once '../vendor/autoload.php'; // Caso use Composer para autoload

use App\core\Router;

$request = $_SERVER['REQUEST_URI'];

//$request = trim($request, '/');
//echo $request;

// Divide a URL em partes

$a=new Router;
$a->route($request);



/*


// Se a URL for no formato /usuarios/editar/123
if (count($segments) == 3 && $segments[0] == 'usuarios' && $segments[1] == 'editar') {
    $id = $segments[2];

    // Cria uma instância do controlador
   // $controller = new UsuarioController();

    // Chama o método editar() passando o ID
    $controller->editar($id);
} else {
    // Caso a URL não corresponda a um formato esperado
    echo "Página não encontrada.";
}
*/