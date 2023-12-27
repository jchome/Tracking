<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Application;

class CreateApplication extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un application
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/Application/createapplication', $data, 'Application');
	}

	/**
	 * Recuperation des objets references
	 */
	private function getData() {
		$data = Array();


		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = $userModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
	
	/**
	 * Ajout d'un Application
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'name' => 'trim|required',
	'code' => 'trim|required',
	'owner' => 'trim',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/Application/createapplication', $data, 'Application');
		}
		
		// Insertion en base
		$data = [

			'id' => $this->request->getPost('id'),
			'name' => $this->request->getPost('name'),
			'code' => $this->request->getPost('code'),
			'owner' => $this->request->getPost('owner'),
		];


		if($data['owner'] == ""){
			$data['owner'] = null;
		}
		$applicationModel = new \App\Models\ApplicationModel();
		
		$applicationModel->insert($data);
		$data['id'] = $applicationModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/Application.message.confirm.added'));

		return redirect()->to('Generated/Application/listapplications/index');
	}
}
