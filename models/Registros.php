<?php

class Registros extends model {

    public function getTodosRegistros() {
        $array = array();
        $sql = "SELECT atendimentos.ID"
                . ",atendimentos.ID_ATENDENTE,"
                . "atendimentos.ID_SERVICO,"
                . "atendimentos.VALOR_PAGO,"
                . "atendimentos.DATACRI,"
                . "atendimentos.ID_CLIENTE,"
                . "atendimentos.DATAMOD,"
                . "atendimentos.NOME_CLIENTE,"
                . "atendimentos.DATAMARCADA,"
                . "users.username as atendenteNome,"
                . "servicos.nome as nomeServico"
                . " from atendimentos,servicos,users "
                . "WHERE atendimentos.ID_SERVICO = servicos.ID "
                . "AND atendimentos.ID_ATENDENTE = users.id ";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function selectConvert() {
        $array = array();
        $sql = "SELECT date_format(str_to_date('30/01/2015', '%d/%m/%Y'), '%Y-%m-%d')";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function addAtendimento($idatendente, $idcliente, $idservico, $nomecliente, $valorpago, $datamarcada, $metodo, $tempoestimado) {
        $sql = "INSERT INTO atendimentos SET"
                . " ID_ATENDENTE = :ID_ATENDENTE,"
                . "ID_CLIENTE = :ID_CLIENTE,"
                . "ID_SERVICO = :ID_SERVICO,"
                . "NOME_CLIENTE = :NOME_CLIENTE,"
                . "VALOR_PAGO = :VALOR_PAGO,"
                . "DATAMARCADA = :DATAMARCADA,"
                . "TEMPOESTIMADO = :TEMPOESTIMADO,"
                . "METODO = :METODO";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':ID_ATENDENTE', $idatendente);
        $sql->bindValue(':ID_CLIENTE', $idcliente);
        $sql->bindValue(':ID_SERVICO', $idservico);
        $sql->bindValue(':NOME_CLIENTE', $nomecliente);
        $sql->bindValue(':VALOR_PAGO', $valorpago);
        $sql->bindValue(':DATAMARCADA', $datamarcada);
        $sql->bindValue(':METODO', $metodo);
        $sql->bindValue(':TEMPOESTIMADO', $tempoestimado);
        $sql->execute();
        return true;
    }

    public function getMeusAtendimentos($id) {

        $sql = "SELECT * FROM atendimentos WHERE ID_CLIENTE = :ID_CLIENTE";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':ID_CLIENTE', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            return $array;
        } else {
            return false;
        }
    }

    public function getMeusServicos($id) {
        $sql = "SELECT * FROM atendimentos WHERE ID_ATENDENTE = :ID_ATENDENTE";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':ID_ATENDENTE', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            return $array;
        } else {
            return false;
        }
    }

}
