<?php
namespace app\Controllers;

use App\Core\Controller;
use App\Models\User;

class newController extends Controller {
    public function index() {
        $this->view('Error');
    }
}
