<?php
class Vendas extends model {
	public function getAll() {
		$array = array();
                
		$sql ="SELECT  "
                        . "registros.id,"
                        . "registros.Produto,"
                        . "registros.sexo,"
                        . "registros.faixa,"
                        . "registros.vendedor from registros";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function get($id) {
		$array = array();

		$sql = "SELECT * FROM registros WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();                   
		}

		return $array;
	}

       
        

	public function add_venda($produto,$sexo,$faixa,$vendedor, $id) {
		
            $sql = "INSERT INTO registros SET Produto = :Produto,sexo = :sexo,faixa = :faixa,vendedor = :vendedor,id_user = :id_user";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':Produto', $produto);
            $sql->bindValue(':sexo',$sexo);
            $sql->bindValue(':faixa', $faixa);
            $sql->bindValue(':vendedor', $vendedor);
            $sql->bindValue(':id_user', $id);
            $sql->execute();
            return true;
		 
	}
	public function edit( $id, $callType,$problem,$soluction) {
		$sql = "UPDATE registros SET "
                        . "callType = :callType,"
                        . "problem = :problem,"
                        . "soluction = :soluction WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':callType', $callType);
		$sql->bindValue(':problem', $problem);
		$sql->bindValue(':soluction', $soluction);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM registros WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
        public function deleteUser($id) {
		$sql = "DELETE FROM users WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	private function emailExists($email) {
		$sql = "SELECT * FROM registros WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
     
}