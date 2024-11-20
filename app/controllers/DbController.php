<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Models\Db;

class DbController extends Controller {
    
    public function index() {
        $user = new Db;
        $data = $user->findAll('pessoa');
        /*foreach($data as $user){
            //echo "<br>" . $user['nome'] ."<br>\n";
            $nome = $user['nome'];
        }
        
        echo $data[1]['nome'];
        */   
        $this->view('db', $data);   
    } 

    public function users(){
        $user = new Db;
        $data = $user->findAll('users');
        $this->view('user/listUser', $data);
     }
    
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
           $this->listPessoa(); 
        }
    }
  

}
