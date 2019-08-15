<?php

class homeController extends controller {

    private $user;

    public function __construct() {
        $this->user = new Users();
        if (!$this->user->verifyLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index() {
        if($this->user->getTipo() == 1){
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $user = new Users();
        $atendimentos = new Registros();     
        $data['atendimentos'] = $atendimentos->getTodosRegistros();
        $this->loadTemplate('home', $data);        
        }else{
            header("Location:".BASE_URL."agendamento/index");
        }
    }

    public function signup() {
        $contatos = new Contatos();
        $data['name'] = $this->user->getName();
        $this->loadTemplate('signup', $data);
    }

}
