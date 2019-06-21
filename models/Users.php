<?php

class Users extends Model {

    private $uid;
    public $id_user;

    public function verifyLogin() {
        if (!empty($_SESSION['chathashlogin'])) {
            $s = $_SESSION['chathashlogin'];
            $sql = "SELECT * FROM users WHERE loginhash = :hash";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":hash", $s);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->uid = $data['id'];

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validateUsername($u) {
        if (preg_match('/^[a-z0-9]+$/', $u)) {
            return true;
        } else {
            return false;
        }
    }

    public function userExists($u) {

        $sql = "SELECT * FROM users WHERE username = :u";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":u", $u);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($username, $pass) {
        $newpass = password_hash($pass, PASSWORD_DEFAULT);

        $sqM = "INSERT INTO users (username, pass) VALUES (:u, :p)";
        $sqM = $this->db->prepare($sqM);
        $sqM->bindValue(":u", $username);
        $sqM->bindValue(":p", $newpass);
        $sqM->execute();
    }

    public function validateUser($username, $pass) {

        $sql = "SELECT * FROM users WHERE username = :username";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":username", $username);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();

            if (password_verify($pass, $info['pass'])) {
                $loginhash = md5(rand(0, 99999) . time() . $info['id'] . $info['username']);

                $this->setLoginHash($info['id'], $loginhash);
                $_SESSION['chathashlogin'] = $loginhash;

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function setLoginHash($uid, $hash) {

        $sql = "UPDATE users SET loginhash = :hash WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":hash", $hash);
        $sql->bindValue(":id", $uid);
        $sql->execute();
    }

    public function clearLoginHash() {
        $_SESSION['chathashlogin'] = '';
    }

    public function getUid() {
        return $this->uid;
    }

    public function getIdAndUsername() {

        $sql = "SELECT id,username FROM users";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $this->uid);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            return $data;
        }
    }

    public function edit($nome, $email, $telefone, $id) {
        $sql = "UPDATE `users` SET `username` = :username, EMAIL = :EMAIL,telefone = :telefone WHERE `users`.`id` = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':username', $nome);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':EMAIL', $email);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return true;
    }

    public function delete($id) {
        $sql = "UPDATE users SET ativo = 0 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return true;
    }

    public function getName() {

        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $this->uid);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            return $data['username'];
        }
    }

    public function getAtendente($id) {

        $sql = "SELECT id,username FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            return $data;
        }
    }

    public function getAllUsuarios($permission) {
        if ($permission == 1) {
            $sql = "SELECT * FROM users WHERE ATIVO = 1";
            $sql = $this->db->prepare($sql);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetchAll();

                return $data;
            }
        } else {
            return false;
        }
    }

    public function getTipo() {

        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $this->uid);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            if ($data['TIPO'] == 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function getID() {

        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $this->uid);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            return $data['id'];
        }
    }

    public function getAll() {

        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $this->uid);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            return $data;
        }
    }

    public function getData($id) {

        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            return $data;
        }
    }

    public function add($nome, $telefone, $email) {

        $sql = "INSERT INTO users SET "
                . "username = :username,"
                . "telefone = :telefone,"
                . "EMAIL = :EMAIL";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':username', $nome);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':EMAIL', $email);
        $sql->execute();
        return true;
    }

}
