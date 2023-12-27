<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Target;

class EditTarget extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$targetModel = new \App\Models\TargetModel();
		$model = $targetModel->find($id);

		$data['target'] = $model;

		$applicationModel = new \App\Models\ApplicationModel();
		$data['applicationCollection'] = $applicationModel->orderBy('name', 'asc')->findAll();
		return $this->view('Generated/Target/edittarget', $data, 'Target');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'app_id' => 'trim|required',
			'name' => 'trim|required',
			'code' => 'trim|required',
			'selector' => 'trim',
		])) {
			log_message('debug','[Edittarget.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Target/edittarget/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$targetModel = new \App\Models\TargetModel();
		$key = $this->request->getPost('id');
		$oldModel = $targetModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'app_id' => $this->request->getPost('app_id'),
			'name' => $this->request->getPost('name'),
			'code' => $this->request->getPost('code'),
			'selector' => $this->request->getPost('selector'),
		];

		if($data['selector'] == ""){
			$data['selector'] = null;
		}

		$targetModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/Target.message.confirm.modified'));
		return redirect()->to('Generated/Target/listtargets/index');
	}


}
?>
