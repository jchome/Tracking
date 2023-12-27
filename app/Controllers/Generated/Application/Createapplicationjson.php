<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Application;

class CreateApplicationJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un application
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['userCollection'] = $this->userservice->getAll($this->db,'name');
*/
		echo view('application/createapplication_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Application
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'name' => 'trim|required',
			'code' => 'trim|required',
			'owner' => 'trim',

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
			'code' => $this->request->getPost('code'),
			'owner' => $this->request->getPost('owner'),

		];


		if($data['owner'] == ""){
			$data['owner'] = null;
		}
		$applicationModel = new \App\Models\ApplicationModel();
		
		$applicationModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $applicationModel->getInsertID();
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


		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = $userModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
}