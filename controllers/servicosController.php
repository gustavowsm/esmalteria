<?php

class servicosController extends controller {

    public function __construct() {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
        if ($this->user->getTipo() == 0) {
            header("Location: " . BASE_URL);
            exit;
        }
    }

    public function index() {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $user = new Users();
        $servicos = new Servicos();
        $data['servicos'] = $servicos->getServicos();
        $this->loadTemplate('servicos', $data);
    }

    public function adicionar() {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $servicos = new Servicos();
        $this->loadTemplate('addservicos', $data);
    }

    public function add() {
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $valor = $_POST['valor'];
            $tempo = new DateTime($_POST['tempo']);
            $descricao = $_POST['descricao'];
            $tempo->format('H:i');
            $s = new Servicos();
            if ($s->add_servicos($nome, $valor, $tempo->format('H:i'), $descricao) == true) {
                header("Location:" . BASE_URL . "servicos/");
            } else {
                header("Location:" . BASE_URL . "servicos/");
            }
        }
    }

    public function delete($id) {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        if ($this->user->getTipo() == 1) {
            $s = new Servicos();
            $s->delete($id);
            header("Location:" . BASE_URL . "servicos/");
        } else {
            header("Location:" . BASE_URL . "servicos/");
        }
    }

    public function edit($id) {
        $s = new Servicos();
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $data['servico'] = $s->getServico($id);
        $this->loadTemplate('editservicos', $data);
    }

    public function true_edit() {
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $valor = $_POST['valor'];
            $tempo = new DateTime($_POST['tempo']);
            $descricao = $_POST['descricao'];  
            $id = $_POST['id'];
            $s = new Servicos();
            echo $nome;
            echo $valor;
            echo $tempo->format('H:i');;
            echo $descricao;
            echo $id;
            if ($s->edit($nome, $valor, $tempo->format('H:i'), $descricao,$id) == true) {
                header("Location:" . BASE_URL . "servicos/");
            } else {
                header("Location:" . BASE_URL . "servicos/");
            }
        }
    }

}
