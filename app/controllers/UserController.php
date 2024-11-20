<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Controllers\DbController;
//use App\Models\Db;

class UserController extends Controller{

    public function criarUsuario(){
        
        $this->view('user/create');
    }
    public function userUpdate($dado){
        $find = new DbController;
        $dado = $find->find($dado);
        //print_r($dado);
        $this->view('/user/update', $dado);
    }
}