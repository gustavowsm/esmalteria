<?php

class Servicos extends model {

    public function getServicos() {
        $array = array();

        $sql = "SELECT * FROM servicos";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getIdServicos() {
        $array = array();

        $sql = "SELECT id,NOME FROM servicos";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function mostraServicos($id) {
        $array = array();
        $sql = " SELECT ID,VALOR,TEMPO,DESCRICAO,NOME FROM servicos WHERE id IN ($id)";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getServico($id) {
        $array = array();

        $sql = "SELECT * FROM servicos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function edit($nome, $valor, $tempo, $descricao, $id) {
        $sql = "UPDATE `servicos` SET `NOME` = :NOME, VALOR = :VALOR, TEMPO = :TEMPO,DESCRICAO = :DESCRICAO WHERE `servicos`.`id` = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':NOME', $nome);
        $sql->bindValue(':VALOR', $valor);
        $sql->bindValue(':TEMPO', $tempo);
        $sql->bindValue(':DESCRICAO', $descricao);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return true;
    }

    public function add_servicos($nome, $valor, $tempo, $descricao) {

        $sql = "INSERT INTO servicos SET NOME = :NOME,VALOR = :VALOR,TEMPO = :TEMPO,DESCRICAO = :DESCRICAO";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':NOME', $nome);
        $sql->bindValue(':VALOR', $valor);
        $sql->bindValue(':TEMPO', $tempo);
        $sql->bindValue(':DESCRICAO', $descricao);
        $sql->execute();
        return true;
    }

    public function delete($id) {
        $sql = "DELETE FROM servicos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function getAtendimentosDeHoje($datamarcada) {
        $array = array();

        $sql = "SELECT * FROM atendimentos WHERE DATAMARCADA  LIKE  '%$datamarcada%'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':DATAMARCADA', $datamarcada);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAtendimentosDeHoje2($datamarcada,$id) {
        $array = array();
        $sql = "SELECT * FROM atendimentos WHERE DATAMARCADA  LIKE  '%$datamarcada%' and ID_ATENDENTE = $id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':ID', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}
