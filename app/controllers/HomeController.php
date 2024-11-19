<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller {
    public function index() {
      session_start();
        if(empty($_SESSION)){
            header('Location: login');
        } else{ 
            $this->view('home');
            //echo 'Nome : '. $_SESSION['username'];
        }
    }
}
