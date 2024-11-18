<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller {
    public function index() {
        $user = new User("Aderbal");
        $data = ['user' => $user->getName()];
        $this->view('home', $data);
    }
}
