<?php

class configuracoesController extends controller
{

    private $user;

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

    public function altera()
    {
        $c = new Confs();
        if (isset($_POST['seg']) && !empty($_POST['seg']) &&
            isset($_POST['segabre']) && !empty($_POST['segabre']) &&
            isset($_POST['segfecha']) && !empty($_POST['segfecha'])) {
            $cd = 1;
            $dia = $_POST['seg'];
            $abre = $_POST['segabre'];
            $fecha = $_POST['segfecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        if (isset($_POST['ter']) && !empty($_POST['ter']) &&
            isset($_POST['terabre']) && !empty($_POST['terabre']) &&
            isset($_POST['terfecha']) && !empty($_POST['terfecha'])) {
            $cd = 2;
            $dia = $_POST['ter'];
            $abre = $_POST['terabre'];
            $fecha = $_POST['terfecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        if (isset($_POST['qua']) && !empty($_POST['qua']) &&
            isset($_POST['quaabre']) && !empty($_POST['quaabre']) &&
            isset($_POST['quafecha']) && !empty($_POST['quafecha'])) {
            $cd = 3;
            $dia = $_POST['qua'];
            $abre = $_POST['quaabre'];
            $fecha = $_POST['quafecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        if (isset($_POST['qui']) && !empty($_POST['qui']) &&
            isset($_POST['quiabre']) && !empty($_POST['quiabre']) &&
            isset($_POST['quifecha']) && !empty($_POST['quifecha'])) {
            $cd = 4;
            $dia = $_POST['qui'];
            $abre = $_POST['quiabre'];
            $fecha = $_POST['quifecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        if (isset($_POST['sex']) && !empty($_POST['sex']) &&
            isset($_POST['sexabre']) && !empty($_POST['sexabre']) &&
            isset($_POST['sexfecha']) && !empty($_POST['sexfecha'])) {
            $cd = 5;
            $dia = $_POST['sex'];
            $abre = $_POST['sexabre'];
            $fecha = $_POST['sexfecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        if (isset($_POST['sab']) && !empty($_POST['sab']) &&
            isset($_POST['sababre']) && !empty($_POST['sababre']) &&
            isset($_POST['sabfecha']) && !empty($_POST['sabfecha'])) {
            $cd = 6;
            $dia = $_POST['sab'];
            $abre = $_POST['sababre'];
            $fecha = $_POST['sabfecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        if (isset($_POST['dom']) && !empty($_POST['dom']) &&
            isset($_POST['domabre']) && !empty($_POST['domabre']) &&
            isset($_POST['domfecha']) && !empty($_POST['domfecha'])) {
            $cd = 7;
            $dia = $_POST['dom'];
            $abre = $_POST['domabre'];
            $fecha = $_POST['domfecha'];
            $c->alteraHorarios($cd, $abre, $fecha);
        }
        header("Location:" . BASE_URL . "configuracoes/");
    }

}
