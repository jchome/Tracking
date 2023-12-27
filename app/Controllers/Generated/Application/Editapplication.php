<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Application;

class EditApplication extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$applicationModel = new \App\Models\ApplicationModel();
		$model = $applicationModel->find($id);

		$data['application'] = $model;

		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = $userModel->orderBy('name', 'asc')->findAll();
		return $this->view('Generated/Application/editapplication', $data, 'Application');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'name' => 'trim|required',
			'code' => 'trim|required',
			'owner' => 'trim',
		])) {
			log_message('debug','[Editapplication.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Application/editapplication/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$applicationModel = new \App\Models\ApplicationModel();
		$key = $this->request->getPost('id');
		$oldModel = $applicationModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'name' => $this->request->getPost('name'),
			'code' => $this->request->getPost('code'),
			'owner' => $this->request->getPost('owner'),
		];

		if($data['owner'] == ""){
			$data['owner'] = null;
		}

		$applicationModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/Application.message.confirm.modified'));
		return redirect()->to('Generated/Application/listapplications/index');
	}


}
?>
