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
        $c = new Confs();
        if (isset($_POST['abre']) && !empty($_POST['abre']) &&
                isset($_POST['fecha']) && !empty($_POST['fecha']) &&
                isset($_POST['dias']) && !empty($_POST['dias'])) {
            echo $abre = $_POST['abre'];
            echo "<br>";
            echo $fecha = $_POST['fecha'];
            echo "<br>";
            echo $dias = implode(",", $_POST['dias']);
            if ($c->update($abre, $fecha, $dias) == true) {
                header("Location:" . BASE_URL . "configuracoes/");
            } else {
                header("Location:" . BASE_URL);
            }
        }
    }

}
