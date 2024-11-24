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
        //verificar uma forma de caso não seja passado $dado ele voltar a pagina da listPessoa
        $find = new DbController;
        $dado = $find->find($dado);
        //print_r($dado);
        $this->view('/user/update', $dado);
    }
    public function index(){
        $find = new DbController;
        $find->users();
    }
    public function createPessoa(){
        $this->view('user/createPessoa');
    }
}