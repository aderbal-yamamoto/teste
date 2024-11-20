<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Models\Db;

/**
 * undocumented class
 */
class loginController extends Controller {
   
    public function index() {
        $this->view('/login/logins');
    }

    /**
     * Verificar senha de usuário 
     *
     * Função para verificar senha de login
     *
     * @param string $_POST['username'] Nome de usuário enviado via Post
     * @param string $_POST['password'] senha enviada via post
     * @return array da $_SESSION
     * @throws conditon
     **/
    public function login(){
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
           //receber dados nome de usuário e senha 
            $username = trim($_POST['username']);
            $password = $_POST['password'];
           //Recuperrar dados do banco e colocar em $data
            $user = new Db;
            $data = $user->findAll('users', $conditions=['username'=>$username]);
            $dados = $data[0];
        
            if (count($data) === 0){

                echo "<script type='text/javascript'>
                          alert('Usuário ou senha inválidos!');
                            window.location.href = '/teste/public/login'; // Redireciona para a tela de login após o alerta
                      </script>";
                exit;

            }else{

                if(password_verify($password, $dados['password'])){
                    session_start();
                    $_SESSION['username'] = $username;
                    
                    header('Location:/teste/public/sobre');
                    exit;

                    }else   {
                         echo "<script type='text/javascript'>
                                alert('Usuário ou senha inválidos!');
                                window.location.href = '/teste/public/login'; // Redireciona para a tela de login após o alerta
                            </script>";
                        exit;
                    }
                }
            }
        // var_dump ($data);
        //$this->view('logins',$data);
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        echo "<script type'text/javascript>
                alert('Fim da seção!');
                window.location.href = '/teste/public/login';
              </script>";
             exit;    
            
    }
}

