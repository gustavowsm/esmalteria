<?php

class Confs extends model
{

    public function getConfs()
    {
        $array = array();

        $sql = "SELECT * FROM confs";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }
    public function getHorariosAtendente($id)
    {
        $array = array();
        $sql = "SELECT * FROM horarios WHERE idusuario = $id";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }
    //Essa função é utilizada para mostrar os atendentes na agendamento/data
    public function getAtendentes()
    {
        $array = array();

        $sql = "SELECT * FROM users WHERE TIPO = 1";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAtendente($id)
    {
        $array = array();

        $sql = "SELECT * FROM users WHERE  ID = $id";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function alteraHorarios($cd, $abre, $fecha)
    {

        switch ($cd) {
            case 1:
                $sql = "UPDATE confs SET SEG = 1,SEGABRE = :ABRE,SEGFECHA = :FECHA";
                break;
            case 2:
                $sql = "UPDATE confs SET TER = 1,TERABRE = :ABRE,TERFECHA = :FECHA";
                break;
            case 3:
                $sql = "UPDATE confs SET QUA = 1,QUAABRE = :ABRE,QUAFECHA = :FECHA";
                break;
            case 4:
                $sql = "UPDATE confs SET QUI = 1,QUIABRE = :ABRE,QUIFECHA = :FECHA";
                break;
            case 5:
                $sql = "UPDATE confs SET SEX = 1,SEXABRE = :ABRE,SEXFECHA = :FECHA";
                break;
            case 6:
                $sql = "UPDATE confs SET SAB = 1,SABABRE = :ABRE,SABFECHA = :FECHA";
                break;
            case 7:
                $sql = "UPDATE confs SET DOM = 1,DOMABRE = :ABRE,DOMFECHA = :FECHA";
                break;
        }
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":ABRE", $abre);
        $sql->bindValue(":FECHA", $fecha);
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getHorario($dia)
    {
        switch ($dia) {
            case 1:
                $sql = "SELECT SEGABRE,SEGFECHA FROM confs";
                break;
            case 2:
                $sql = "SELECT TERABRE ,TERFECHA FROM confs";
                break;
            case 3:
                $sql = "SELECT QUAABRE,QUAFECHA FROM confs";
                break;
            case 4:
                $sql = "SELECT QUIABRE ,QUIFECHA FROM confs";
                break;
            case 5:
                $sql = "SELECT SEXABRE ,SEXFECHA FROM confs";
                break;
            case 6:
                $sql = "SELECT SABABRE,SABFECHA FROM confs";
                break;
            case 0:
                $sql = "SELECT DOMABRE,DOMFECHA FROM confs";
                break;
        }
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

}
