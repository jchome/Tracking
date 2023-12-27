<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\User;

class CreateUserJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un user
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
*/
		echo view('user/createuser_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un User
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
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
			$data = $this->getData();
			$data['validation'] = $this->validator;
			return $this->respond([
				'status' => 'error',
				'data' => $data
			]);
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
		
		$userModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $userModel->getInsertID();
		}



		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
		
	}
	


	/**
	 * Recuperation des objets references
	 */
	private function getData() {
		$data = Array();


		return $data;
	}
}