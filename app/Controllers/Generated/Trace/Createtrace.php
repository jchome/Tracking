<?php
/*
 * Created by generator
 * 
 */
namespace App\Controllers\Generated\Trace;

class CreateTrace extends \App\Controllers\HtmlController {
	
	
	/**
	 * page de creation d'un trace
	 */	
	public function index(){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}

		helper(['form']);
		$data = $this->getData();
		return $this->view('Generated/Trace/createtrace', $data, 'Trace');
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
	
	/**
	 * Ajout d'un Trace
	 */
	public function add(){
	
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
			$this->view('Generated/Trace/createtrace', $data, 'Trace');
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
		
		$traceModel->insert($data);
		$data['id'] = $traceModel->getInsertID();



		
		// Recharge la page avec les nouvelles infos
		session()->setFlashData('msg_confirm', lang('generated/Trace.message.confirm.added'));

		return redirect()->to('Generated/Trace/listtraces/index');
	}
}
