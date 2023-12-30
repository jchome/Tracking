<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Trace;

use App\Libraries\TargetService;
use App\Libraries\TraceService;

class ListTraces extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Traces
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'dt_trace';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();
		$applicationModel = new \App\Models\ApplicationModel();
		$targetModel = new \App\Models\TargetModel();

		//log_message('debug', "userid = " . session()->get('user_id'));

		if(session()->get('user_id') == -1){
			$data['traces'] = $traceModel
				->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
				
			$data['applicationCollection'] = index_data($applicationModel->orderBy('name', 'asc')
				->findAll(), 'id');
			$data['targetCollection'] = index_data($targetModel->orderBy('name', 'asc')
				->findAll(), 'id');
			$data['pager'] = $traceModel->pager;
		}else{
			$data['traces'] = (new TraceService())->forUserId(session()->get('user_id'));
			$data['applicationCollection'] = index_data($applicationModel
				->where('owner', session()->get('user_id'))->orderBy('name', 'asc')
				->findAll(), 'id');
			$data['targetCollection'] = index_data( (new TargetService())->forUserId(session()->get('user_id')), 'id');
		}

		return $this->view('Generated/Trace/listtraces', $data, 'Trace');
	}

	
	/**
	 * Suppression d'un Trace
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$traceModel = new \App\Models\TraceModel();
		$traceModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Trace.message.confirm.deleted'));
		return redirect()->to('Generated/Trace/listtraces/index'); 
	}

}
?>
