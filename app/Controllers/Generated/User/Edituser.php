<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\User;

class EditUser extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$userModel = new \App\Models\UserModel();
		$model = $userModel->find($id);

		$data['user'] = $model;

		return $this->view('Generated/User/edituser', $data, 'User');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'name' => 'trim|required',
			'login' => 'trim|required',
			'password' => 'trim|required',
			'email' => 'trim',
		])) {
			log_message('debug','[Edituser.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/User/edituser/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$userModel = new \App\Models\UserModel();
		$key = $this->request->getPost('id');
		$oldModel = $userModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'name' => $this->request->getPost('name'),
			'login' => $this->request->getPost('login'),
			'password' => generateHash($this->request->getPost('password')),
			'email' => $this->request->getPost('email'),
		];

		if($data['email'] == ""){
			$data['email'] = null;
		}

		$userModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/User.message.confirm.modified'));
		return redirect()->to('Generated/User/listusers/index');
	}


}
?>
