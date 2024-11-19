<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Models\User;

class AboutController extends Controller {
    public function index() {
        $user = new User("Aderbal");
        $data = ['user' => $user->getName()];
        $this->view('sobre', $data);
    }
    
}
