<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {
        $this->render('home');
    }

    public function buscaCep(){
        if (isset($_POST['cep'])) {
            $cep = filter_input(INPUT_POST, 'cep');
            
        }
    }
}