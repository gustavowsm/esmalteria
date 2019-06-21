<?php

class Confs extends model {

    public function getConfs() {
        $array = array();

        $sql = "SELECT ABRE,FECHA,DIAS FROM confs";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }
    //Essa função é utilizada para mostrar os atendentes na agendamento/data
    public function getAtendentes() {
        $array = array();

        $sql = "SELECT * FROM users WHERE TIPO = 1";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}