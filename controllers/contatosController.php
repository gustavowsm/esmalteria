<?php   
class contatosController extends controller {

	public function index() {}
	public function add_save() {
            $contatos = new Contatos();
           
		if(!empty($_POST['client'])) {
			$client = $_POST['client'];
			$soluction = $_POST['soluction'];
			$callType = $_POST['callType'];
			$problem = $_POST['problem'];
			$id = $_POST['id_user'];
                        
			if($contatos->add($callType, $problem, $soluction, $client, $id)) {
				header("Location: ".BASE_URL);
			} else {
				header("Location: ".BASE_URL.'contatos/add?error=exist');
			}			
		} else {
			header("Location: ".BASE_URL.'contatos/add');
		}      
                                  
			    
	}        
        private $user;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->verifyLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}
	}
	public function add() {
            $contatos = new Contatos();
		$data = array(
			'name' => $this->user->getName(),
			'id' => $this->user->getID()
		);
		$this->loadTemplate('add', $data);
	} 
        

	public function edit($id) {
		// 1Âº passo: pegar as informaÃ§Ãµes do contato pelo ID
		// 2Âº passo: carregar o formulÃ¡rio, preenchido.
		// 3Âº passo: receber os dados do form e editar.
		$dados = array();

		if(!empty($id)) {
			$contatos = new Contatos();

			if(!empty($_POST['callType']) && !empty($_POST['problem']) && !empty($_POST['soluction'])) {
				$callType = $_POST['callType'];
                                $problem = $_POST['problem'];
                                $soluction = $_POST['soluction'];
                                
				$contatos->edit($id, $callType, $problem, $soluction);
			} else {
				$dados['info'] = $contatos->get($id);

				if(isset($dados['info']['id'])) {
					$this->loadTemplate('edit', $dados);
					exit;
				}
			}
		}

		header("Location: ".BASE_URL);
	}

	public function del($id) {
		if(!empty($id)) {
			$contatos = new Contatos();
			$contatos->delete($id);
		}

		header("Location: ".BASE_URL);
	}
    	public function delUser($id) {
		if(!empty($id)) {
			$contatos = new Contatos();
			$contatos->deleteUser($id);
		}

		header("Location: ".BASE_URL."/login/seeUsers");
	}
    


}



















