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
}
