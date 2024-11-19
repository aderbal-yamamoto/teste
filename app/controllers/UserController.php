<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Models\Db;

class UserController extends Controller{
    public function index(){
       $user = new Db;
       $data = $user->findAll('users');
       $this->view('user/listUser', $data);
    }
    public function criarUsuario(){
        
        $this->view('user/create');
    }
}