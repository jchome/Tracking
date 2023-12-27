<?php

/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Trace;

class CreateTraceJson extends \App\Controllers\AjaxController {

	/**
	 * page de creation d'un trace
	 */	
	public function index(){
		$data = Array();
		/*
		// Recuperation des objets references
		$data['applicationCollection'] = $this->applicationservice->getAll($this->db,'name');
		$data['targetCollection'] = $this->targetservice->getAll($this->db,'name');
*/
		echo view('trace/createtrace_fancyview', $data);
	}
	
	/**
	 * Ajout / Mise a jour d'un Trace
	 * Si le champ 'id' est vide, un nouvel enregistrement sera cree
	 */
	public function save(){
	
		helper(['form', 'database', 'security']);
		$validation =  \Config\Services::validation();

		if (! $this->validate([
			'dt_trace' => 'trim|required',
			'app_id' => 'trim|required',
			'target_id' => 'trim|required',
			'detail' => 'trim',

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
			'dt_trace' => $this->request->getPost('dt_trace'),
			'app_id' => $this->request->getPost('app_id'),
			'target_id' => $this->request->getPost('target_id'),
			'detail' => $this->request->getPost('detail'),

		];


		if($data['detail'] == ""){
			$data['detail'] = null;
		}
		$traceModel = new \App\Models\TraceModel();
		
		$traceModel->save($data);
		if($data['id'] == null || $data['id'] == ""){
			$data['id'] = $traceModel->getInsertID();
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
		$targetModel = new \App\Models\TargetModel();
		$data['targetCollection'] = $targetModel->orderBy('name', 'asc')->findAll();
		return $data;
	}
}