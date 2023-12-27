<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Trace;

class EditTrace extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$traceModel = new \App\Models\TraceModel();
		$model = $traceModel->find($id);

		$data['trace'] = $model;

		$applicationModel = new \App\Models\ApplicationModel();
		$data['applicationCollection'] = $applicationModel->orderBy('name', 'asc')->findAll();
		$targetModel = new \App\Models\TargetModel();
		$data['targetCollection'] = $targetModel->orderBy('name', 'asc')->findAll();
		return $this->view('Generated/Trace/edittrace', $data, 'Trace');
	}

	/**
	 * Sauvegarde des modifications
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
			log_message('debug','[Edittrace.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Trace/edittrace/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$traceModel = new \App\Models\TraceModel();
		$key = $this->request->getPost('id');
		$oldModel = $traceModel->find($key);

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

		$traceModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/Trace.message.confirm.modified'));
		return redirect()->to('Generated/Trace/listtraces/index');
	}


}
?>
