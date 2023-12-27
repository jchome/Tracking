<?php 

namespace App\Controllers;

use App\Models\UserModel;

class Welcome extends HtmlController {

	public function index(){
		
		helper(['form', 'security']);
		$formSend = $this->request->getPost('formSend');

		$session = session();

		// on est déjà connecté et on repart sur l'accueil
		if($formSend == ""){
			// The form is not sent

		 	if( $session->get('user_id') != null){
				return redirect()->to('Generated/Application/listapplications/index');
			 }else{
				echo view('welcome');
				return;
			 }
		}


		if (! $this->validate([
			'login' => 'required',
			'password' => 'required',
			])) {
			return;
			log_message('debug','[welcome.php] : no parameter.');
			echo view('welcome');
			return;
		}
		
		$login = $this->request->getPost('login'); 
		$password = $this->request->getPost('password');
		$data = Array();
	
		if ($login == "admin" && $password == "/xx*xx*xx/") {
			$session->set('user_id', -1);

			log_message('debug','[welcome.php] : ADMIN is connected.');
			return redirect()->to('Generated/Application/listapplications/index');
		} else {
			$userModel = new \App\Models\UserModel();
			$allUsers = $userModel->where('login', $login)->findAll();
			if(sizeOf($allUsers) != 1){
				$data['message'] = 'Identifiant ['.$login.'] ou mot de passe incorrect...';
				log_message('debug','[welcome.php] : too much users with this login');
				$session->setFlashdata('error', 'Identifiant ['.$login.'] ou mot de passe incorrect...');
				return $this->view('welcome', $data, "Welcome");
			}
			$user = end($allUsers);
			// Check password
			if($password != $user['password'] && ! verify($password, $user['password'])){
				$data['message'] = 'Identifiant ['.$login.'] ou mot de passe incorrect...';
				log_message('debug','[welcome.php] : incorrect login or password');
				$session->setFlashdata('error', 'Identifiant ['.$login.'] ou mot de passe incorrect...');
				return $this->view('welcome', $data, "Welcome");
			}
			$session->set('user_id', $user['id']);
			$session->set('currentUser', (object)$user);
			log_message('debug','[welcome.php] : user connected: '. $login);
			log_message('debug','[welcome.php] session/userid = ' . $session->get('user_id'));

			return redirect()->to('Generated/Target/listtargets/');
			
		}
		
	}
	
	/**
	 * Deconnexion
	 */
	function logout(){
		$session = session();
		$session->remove('user_id');
		return redirect()->to('welcome/index'); 
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
