<?php
class loginController extends controller {
 
	public function index() {
		$data = array(
			'msg' => ''
		);

		if(!empty($_GET['error'])) {
			if($_GET['error'] == '1') {
				$data['msg'] = 'Usuário e/ou senha inválidos!';
			}
		}

		$this->loadView('login', $data);
	}

	public function signin() {

		if(!empty($_POST['username'])) {
			$username = strtolower($_POST['username']);
			$pass = $_POST['pass'];
			$users = new Users();
			if($users->validateUser($username, $pass)) {
				header("Location: ".BASE_URL);                               
                        
 		$sql = "select id FROM registros WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();           
				exit;
			} else {
				header("Location: ".BASE_URL.'login?error=1');
				exit;
			}
		} else {
			header("Location: ".BASE_URL.'login');
			exit;
		}

	}

	public function signup() {
                $us  = new Users();
		$data = array(
			'msg' => '',
                    'name'=>$us->getName()
		);

		if(!empty($_POST['username'])) {
			$username = strtolower($_POST['username']);
			$pass = $_POST['pass'];
                        
			$users = new Users();
                      
			if($users->validateUsername($username)) {
				if(!$users->userExists($username)) {
					$users->registerUser($username, $pass);

					header("Location: ".BASE_URL."login");
				} else {
					$data['msg'] = 'UsuÃ¡rio jÃ¡ existente!';
				}
			} else {
				$data['msg'] = 'UsuÃ¡rio nÃ£o vÃ¡lido (Digite apenas letras e nÃºmeros).';
			}
		}

		$this->loadTemplate('signup', $data);
	}
        public function seeUsers(){
            $us = new Users();
            $data= array(
                'lista'=>$us->getAll(),
                'name'=>$us->getName()
            );
            
            $this->loadTemplate('seeUsers',$data);
        }
       	public function del($id) {
		if(!empty($id)) {
			$contatos = new Contatos();
			$users->deleteUser($id);
		}

		header("Location: ".BASE_URL."/login/seeUsers");
	} 

	public function logout() {
		$users = new Users();
		$users->clearLoginHash();

		header("Location: ".BASE_URL.'login');
	}

}
















