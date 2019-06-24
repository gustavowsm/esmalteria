<?php

class usuariosController extends controller {

    public function __construct() {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index() {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $user = new Users();
        $atendimentos = new Registros();
        $data['atendimentos'] = $atendimentos->getTodosRegistros();
        $this->loadTemplate('users', $data);
    }

    public function editar($id) {
        $data['id'] = $id;
        $data['userdata'] = $this->user->getData($id);
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $this->loadTemplate('edit', $data);
    }

    public function true_edit() {
        $user = new Users();
        if ($_POST['atendente'] == 1 && $_POST['cliente'] == 0) {
            if (isset($_POST['nome']) && !empty($_POST['nome']) &&
                    isset($_POST['telefone']) && !empty($_POST['telefone']) &&
                    isset($_POST['horarios']) && !empty($_POST['horarios']) &&
                    isset($_POST['email']) && !empty($_POST['email'])) {
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $id = $_POST['id'];
                $horarios = implode(",", $_POST['horarios']);

                if ($user->editAtendente($nome, $email, $telefone, $id, $horarios)) {
                    header("Location: " . BASE_URL . "usuarios/");
                } else {
                    header("Location: " . BASE_URL . "usuarios/");
                }
            }
        }
        if ($_POST['atendente'] == 0 && $_POST['cliente'] == 1) {
            $user = new Users();
            if (isset($_POST['nome']) && !empty($_POST['nome']) &&
                    isset($_POST['telefone']) && !empty($_POST['telefone']) &&
                    isset($_POST['email']) && !empty($_POST['email'])) {
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $id = $_POST['id'];

                if ($user->edit($nome, $email, $telefone, $id)) {
                    header("Location: " . BASE_URL . "usuarios/");
                } else {
                    header("Location: " . BASE_URL . "usuarios/");
                }
            }
        }
    }

    public function edit_self() {
        $user = new Users();
        if (isset($_POST['nome']) && !empty($_POST['nome']) &&
                isset($_POST['telefone']) && !empty($_POST['telefone']) &&
                isset($_POST['email']) && !empty($_POST['email'])) {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $id = $_POST['id'];

            if ($user->edit($nome, $email, $telefone, $id)) {
                header("Location: " . BASE_URL . "usuarios/minha_conta/");
            } else {
                header("Location: " . BASE_URL . "usuarios/minha_conta/");
            }
        }
    }

    public function excluir($id) {
        if ($this->user->getTipo() == 1) {
            $user = new Users();
            if ($user->delete($id)) {
                header("Location:" . BASE_URL . "usuarios/");
            } else {
                header("Location: " . BASE_URL);
            }
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function adicionar() {
        if ($this->user->getTipo() == 0) {
            header("Location: " . BASE_URL);
            exit;
        } else {
            $data['tipo'] = $this->user->getTipo();
            $data['name'] = $this->user->getName();
            $this->loadTemplate('addusuario', $data);
        }
    }

    public function add_usuario() {
        if ($this->user->getTipo() == 0) {
            header("Location: " . BASE_URL);
            exit;
        } else {
            $users = new Users();
            $data['name'] = $this->user->getName();
            if (isset($_POST['nome']) && !empty($_POST['nome']) &&
                    isset($_POST['telefone']) && !empty($_POST['telefone']) &&
                    isset($_POST['email']) && !empty($_POST['email'])) {
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                if ($users->add($nome, $telefone, $email) == true) {
                    echo "Usuário inserido e esperando a redefinição de senha!";
                } else {
                    echo "Usuario não inserido";
                }
            } else {
                header("Location: " . BASE_URL . "usuarios/adicionar/");
            }
        }
    }

    public function meus_servicos() {
        if ($this->user->getTipo() == 0) {
            $r = new Registros();
            $s = new Servicos();
            $data['tipo'] = $this->user->getTipo();
            $data['name'] = $this->user->getName();
            $data['atendimentos'] = $r->getMeusAtendimentos($this->user->getUid());

            foreach ($s->getIdServicos() as $a) {
                $idservicos[] = $a['id'];
                $nomes[] = $a['NOME'];
            }
            $data['servicos'] = $idservicos;
            $data['nomes'] = $nomes;
            $this->loadTemplate('clienteServicos', $data);
        }
        if ($this->user->getTipo() == 1) {
            $r = new Registros();
            $s = new Servicos();
            $data['tipo'] = $this->user->getTipo();
            $data['name'] = $this->user->getName();
            $data['atendimentos'] = $r->getMeusServicos($this->user->getUid());

            foreach ($s->getIdServicos() as $a) {
                $idservicos[] = $a['id'];
                $nomes[] = $a['NOME'];
            }
            $data['servicos'] = $idservicos;
            $data['nomes'] = $nomes;
            $this->loadTemplate('atendenteServicos', $data);
        }
    }

    public function minha_conta() {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $user = new Users();
        $data['info'] = $this->user->getAll();
        $atendimentos = new Registros();
        $this->loadTemplate('minhaconta', $data);
    }

}
