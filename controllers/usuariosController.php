<?php

class usuariosController extends controller
{

    public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index()
    {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $user = new Users();
        $atendimentos = new Registros();
        $data['atendimentos'] = $atendimentos->getTodosRegistros();
        $this->loadTemplate('users', $data);
    }

    public function editar($id)
    {
        $c = new Confs();
        $data['id'] = $id;
        $data['userdata'] = $this->user->getData($id);
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['confs'] = $c->getHorariosAtendente($id);
        $this->loadTemplate('edit', $data);
    }

    public function true_edit()
    {
        $user = new Users();
        //para atendentes
        if ($_POST['atendente'] == 1 && $_POST['cliente'] == 0) {
            $email = (isset($_POST['email'])) ? $_POST['email'] : null;
            $nome = (isset($_POST['nome'])) ? $_POST['nome'] : null;
            $telefone = (isset($_POST['telefone'])) ? $_POST['telefone'] : null;
            //horarios de trab
            $seg = (isset($_POST['seg'])) ? $_POST['seg'] : null;
            $segentra = (isset($_POST['segentra'])) ? $_POST['segentra'] : null;
            $segsai = (isset($_POST['segsai'])) ? $_POST['segsai'] : null;
            $ter = (isset($_POST['ter'])) ? $_POST['ter'] : null;
            $terentra = (isset($_POST['terentra'])) ? $_POST['terentra'] : null;
            $tersai = (isset($_POST['tersai'])) ? $_POST['tersai'] : null;
            $qua = (isset($_POST['qua'])) ? $_POST['qua'] : null;
            $quaentra = (isset($_POST['quaentra'])) ? $_POST['quaentra'] : null;
            $quasai = (isset($_POST['quasai'])) ? $_POST['quasai'] : null;
            $qui = (isset($_POST['qui'])) ? $_POST['qui'] : null;
            $quientra = (isset($_POST['quientra'])) ? $_POST['quientra'] : null;
            $quisai = (isset($_POST['quisai'])) ? $_POST['quisai'] : null;
            $sex = (isset($_POST['sex'])) ? $_POST['sex'] : null;
            $sexentra = (isset($_POST['sexentra'])) ? $_POST['sexentra'] : null;
            $sexsai = (isset($_POST['sexsai'])) ? $_POST['sexsai'] : null;
            $sab = (isset($_POST['sab'])) ? $_POST['sab'] : null;
            $sabentra = (isset($_POST['sabentra'])) ? $_POST['sabentra'] : null;
            $sabsai = (isset($_POST['sabsai'])) ? $_POST['sabsai'] : null;
            $dom = (isset($_POST['dom'])) ? $_POST['dom'] : null;
            $domentra = (isset($_POST['domentra'])) ? $_POST['domentra'] : null;
            $domsai = (isset($_POST['domsai'])) ? $_POST['domsai'] : null;

            
            if($nome == null or $email == null or $telefone == null or $id == null){
                header("Location: " . BASE_URL . "usuarios/");
            }else{
                $user->editAtendente($nome, $email, $telefone, $id);
            }
            if($seg == null or $segentra == null or $segsai == null){
                
            }else{
                $user->editHorarioAtendente(1,$segentra,$segsai);
            }
            if($ter == null or $terentra == null or $tersai == null){
                
            }else{
                $user->editHorarioAtendente(2,$terentra,$tersai);
            }
            if($qua == null or $quaentra == null or $quasai == null){
                
            }else{
                $user->editHorarioAtendente(3,$quaentra,$quasai);
            }
            if($qui == null or $quientra == null or $quisai == null){
                
            }else{
                $user->editHorarioAtendente(4,$quientra,$quisai);
            }
            if($sex == null or $sexentra == null or $sexsai == null){
                
            }else{
                $user->editHorarioAtendente(5,$sexentra,$sexsai);
            }
            if($sab == null or $sabentra == null or $sabsai == null){
                
            }else{
                $user->editHorarioAtendente(6,$sabentra,$sabsai);
            }
            if($dom == null or $domentra == null or $domsai == null){
                
            }else{
                $user->editHorarioAtendente(7,$domentra,$domsai);
            }
            


        }
        //para usuarios
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

    public function edit_self()
    {
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

    public function excluir($id)
    {
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

    public function adicionar()
    {
        if ($this->user->getTipo() == 0) {
            header("Location: " . BASE_URL);
            exit;
        } else {
            $data['tipo'] = $this->user->getTipo();
            $data['name'] = $this->user->getName();
            $this->loadTemplate('addusuario', $data);
        }
    }

    public function add_usuario()
    {
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

    public function meus_servicos()
    {
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

    public function minha_conta()
    {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $data['usuarios'] = $this->user->getAllUsuarios($this->user->getTipo());
        $user = new Users();
        $data['info'] = $this->user->getAll();
        $atendimentos = new Registros();
        $this->loadTemplate('minhaconta', $data);
    }

}
