<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Models\Db;

class DbController extends Controller {
    /**
     * Listar Tabela de Pessoas
     *
     **/
    public function index() {
        $user = new Db;
        $data = $user->findAll('pessoa');
        $this->view('db', $data);   
    } 
    /**
     * Listar Tabela de Usuários com login
     *
     **/
    public function users(){
        $user = new Db;
        $data = $user->findAll('users');
        $this->view('user/listUser', $data);
     }
    /**
     * Criar item na Tabela de usuários com login
     *
     **/
    public function create(){
      
        if($_SERVER['REQUEST_METHOD']==='POST'){
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $data['username'] = $_POST['username'];
        $data['password'] = $hashedPassword;
        $user = new Db;
        $result = $user->create('users',$data);
        echo $result;
        header('Location:/teste/public/db/users');
        }
    }
    

    public function listPessoa(){
        $pessoa = new Db;
        $data = $pessoa->findAll('pessoa');
        $this->view('/user/listPessoa', $data);

    }

    public function find($id){
        $find = new Db;
        $data = $find->findById('pessoa',$id);
        return $data;
       
    }
    public function update(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
           $data = $_POST; 
           $id=$_POST['id'];
          
           $db = new Db;
           $db->update('pessoa', $data, $id);
           /* Os dois metodos a seguir faziam a mesma função mas usando a chamada 
           *  da função ele fornece uma informação de continuar o que não é esperado para o sistema
           */
           //$this->listPessoa(); 
           header('Location:/teste/public/db/listPessoa');
        }
    }
    public function createPessoa(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $data = $_POST;
            $user = new Db;
            $id = $user->maxId('pessoa');
            $id = $id['max_id']+1;
            $data['id'] = $id;
            $result = $user->create('pessoa',$data);
            echo $result;
            header('Location:/teste/public/db/listPessoa');
           //$user->create('pessoa',$data);
        }
    }
  

}
