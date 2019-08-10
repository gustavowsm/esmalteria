<?php

class agendamentoController extends controller
{

    private $user;

    public function __construct()
    {
        $this->user = new Users();
        date_default_timezone_set('America/Sao_Paulo');
        if (!$this->user->verifyLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index()
    {
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $user = new Users();
        $this->loadTemplate('calendario', $data);
    }

    public function data($dia)
    {
        $timeZone = new DateTimeZone('UTC');
        $data1 = DateTime::createFromFormat('d', $dia, $timeZone);
        $data2 = DateTime::createFromFormat('d', date('d'), $timeZone);
        /** Testa se sao validas */
        if (!($data1 instanceof DateTime)) {
            echo 'Data de entrada invalida!!';
        }
        if (!($data2 instanceof DateTime)) {
            echo 'Data de saida invalida!!';
        }
        /** Compara as datas normalmente com operadores de comparacao < > = e != */
        if ($data1 > $data2 or $data1 == $data2) {
            $c = new Confs();
            $s = new Servicos();
            $data['tipo'] = $this->user->getTipo();
            $data['name'] = $this->user->getName();
            $hoje = getdate(strtotime('now'));
            $data['hoje'] = $hoje;
            $data['dia'] = $dia;
            $data['confs'] = $c->getConfs();
            $data['atendentes'] = $c->getAtendentes();
            $datamarcada = date("Y-m-d", mktime(0, 0, 0, date('m'), $dia, date('Y')));
            $data['servicoshj'] = $s->getAtendimentosDeHoje($datamarcada);
            $this->loadTemplate('agendamento', $data);
        }
        if ($data1 < $data2) {
            //mandar uma mensagem depois dizendo que a data escolhida ja passou
            header('Location:' . BASE_URL . 'agendamento?error=1');
        }
    }

    public function confere()
    {
        $c = new Confs();
        $s = new Servicos();
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        $hoje = getdate(strtotime('now'));
        $data['hoje'] = $hoje;
        $data['dia'] = $_GET['data'];
        $data['confs'] = $c->getConfs();
        $data['atendentes'] = $c->getAtendente($_GET['idatd']);
        $datamarcada = date("Y-m-d", mktime(0, 0, 0, date('m'), $_GET['data'], date('Y')));
        $data['servicoshj2'] = $s->getAtendimentosDeHoje2($datamarcada, $_GET['idatd']);
        $this->loadTemplate('confere', $data);
    }

    public function servicos()
    {
        $u = new Users();
        $s = new Servicos();
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        if (isset($_GET['data']) && !empty($_GET['data']) &&
            isset($_GET['horario']) && !empty($_GET['horario']) &&
            isset($_GET['idatd']) && !empty($_GET['idatd'])) {
            //data escolhida para realizar o servico
            $data['dataEscolhida'] = date("Y-m-d H:i:s", mktime(
                //horario escolhido
                $_GET['horario'],
                //hora
                0,
                //minutos
                0,
                //segundos
                date('m'),
                //meses
                $_GET['data'],
                //dias
                date('o')));
            //hora da exata da marcacao do servico
            $data['agora'] = date("Y-m-d H:i:s");
            //servicos
            $data['servicos'] = $s->getServicos();
            $data['atendente'] = $u->getAtendente($_GET['idatd']);
            $this->loadTemplate('marcacao', $data);
        }
    }

    public function confirma()
    {
        $u = new Users();
        $s = new Servicos();
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        if (isset($_POST['servico']) && !empty($_POST['servico']) &&
            isset($_POST['nome']) && !empty($_POST['nome']) &&
            isset($_POST['atendente']) && !empty($_POST['atendente']) &&
            isset($_POST['idatendente']) && !empty($_POST['idatendente']) &&
            isset($_POST['dataescolhida']) && !empty($_POST['dataescolhida'])) {
            //primeiro eu to recebendo o meu array e juntando ele
            //depois eu to tirando o ultimo caractere
            $ids = substr(implode("", $_POST['servico']), 0, -1);
            $data['dados'] = $s->mostraServicos($ids);
            $data['tempoestimado'] = $s->mostraServicos($ids);
            $data['nome'] = $_POST['nome'];
            $data['atendente'] = $_POST['atendente'];
            $data['idatendente'] = $_POST['idatendente'];
            $data['dataescolhida'] = $_POST['dataescolhida'];
            $this->loadTemplate('confirma', $data);
        }
    }

    public function finaliza()
    {
        $u = new Users();
        $s = new Registros();
        $data['tipo'] = $this->user->getTipo();
        $data['name'] = $this->user->getName();
        if (isset($_POST['idatendente']) && !empty($_POST['idatendente']) &&
            isset($_POST['total']) && !empty($_POST['total']) &&
            isset($_POST['servicos']) && !empty($_POST['servicos']) &&
            isset($_POST['pagamento']) && !empty($_POST['pagamento']) &&
            isset($_POST['datamarcada']) && !empty($_POST['datamarcada'])) {
            $idatendente = $_POST['idatendente'];
            $valorpago = $_POST['total'];
            $idservico = $_POST['servicos'];
            $nomecliente = $this->user->getName();
            $idcliente = $this->user->getUid();
            $datamarcada = $_POST['datamarcada'];
            $metodo = $_POST['pagamento'];
            $horas = $_POST['horas'];
            $minutos = $_POST['minutos'];
            $tempoestimado = date('H:i', mktime($horas, $minutos));
            if ($s->addAtendimento($idatendente, $idcliente, $idservico, $nomecliente, $valorpago, $datamarcada, $metodo, $tempoestimado)) {
                //direcionar para a parte que mostra os horarios marcados da pessoa
                header("Location:" . BASE_URL . "usuarios/meus_servicos/");
            } else {
                //direcionar para a parte inicial de marcar um horario
                header("Location:" . BASE_URL);
            }
        } else {
            header("Location:" . BASE_URL . "");
        }
    }

}
