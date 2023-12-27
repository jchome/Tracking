<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\User;

class CreateUser extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un user
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/User/createuser', $data, 'User');
	}

	/**
	 * Recuperation des objets references
	 */
	private function getData() {
		$data = Array();


		return $data;
	}
	
	/**
	 * Ajout d'un User
	 */
	public function add(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([

	'name' => 'trim|required',
	'login' => 'trim|required',
	'password' => 'trim|required',
	'email' => 'trim',
		])) {
			$data = $this->getData();
			$data['validation'] = $this->validator;
			$this->view('Generated/User/createuser', $data, 'User');
		}
		
		// Insertion en base
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
		$userModel = new \App\Models\UserModel();
		
		$userModel->insert($data);
		$data['id'] = $userModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/User.message.confirm.added'));

		return redirect()->to('Generated/User/listusers/index');
	}
}
