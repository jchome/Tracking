<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Target;

class CreateTarget extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un target
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/Target/createtarget', $data, 'Target');
	}

	/**
	 * Recuperation des objets references
	 */
	private function getData() {
		$data = Array();


		$applicationModel = new \App\Models\ApplicationModel();
		$data['applicationCollection'] = $applicationModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
	
	/**
	 * Ajout d'un Target
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'app_id' => 'trim|required',
	'name' => 'trim|required',
	'code' => 'trim|required',
	'selector' => 'trim',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/Target/createtarget', $data, 'Target');
		}
		
		// Insertion en base
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
		$targetModel = new \App\Models\TargetModel();
		
		$targetModel->insert($data);
		$data['id'] = $targetModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/Target.message.confirm.added'));

		return redirect()->to('Generated/Target/listtargets/index');
	}
}
