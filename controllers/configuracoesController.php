<?php

class configuracoesController extends controller {

    private $user;

    public function __construct() {
        $this->user = new Users();
        if (!$this->user->verifyLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index() {
        if ($this->user->getTipo() == 1) {
            $c = new Confs();
            $data['tipo'] = $this->user->getTipo();
            $data['name'] = $this->user->getName();
            $data['confs'] = $c->getConfs();
            $this->loadTemplate('configuracoes', $data);
        } else {
            header("Location:" . BASE_URL);
        }
    }

    public function altera() {
        if (isset($_POST['abre']) && !empty($_POST['abre']) &&
                isset($_POST['fecha']) && !empty($_POST['fecha']) &&
                isset($_POST['dias']) && !empty($_POST['dias'])) {
            echo $_POST['abre'];
            echo "<br>";
            echo $_POST['fecha'];    echo "<br>";
            echo implode(",",$_POST['dias']);
        }
    }

}
