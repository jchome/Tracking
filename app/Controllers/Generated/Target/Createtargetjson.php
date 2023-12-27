<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Target;

class CreateTargetJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un target
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['applicationCollection'] = $this->applicationservice->getAll($this->db,'name');
*/
		echo view('target/createtarget_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Target
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
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
			'app_id' => $this->request->getPost('app_id'),
			'name' => $this->request->getPost('name'),
			'code' => $this->request->getPost('code'),
			'selector' => $this->request->getPost('selector'),

		];


		if($data['selector'] == ""){
			$data['selector'] = null;
		}
		$targetModel = new \App\Models\TargetModel();
		
		$targetModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $targetModel->getInsertID();
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


		$applicationModel = new \App\Models\ApplicationModel();
		$data['applicationCollection'] = $applicationModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
}