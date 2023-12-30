<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Target;

use App\Libraries\TargetService;

class ListTargets extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Targets
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'app_id';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();
		$applicationModel = new \App\Models\ApplicationModel();

		if(session()->get('user_id') == -1){
			$data['targets'] = $targetModel
				->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
			$data['pager'] = $targetModel->pager;
			$data['applicationCollection'] = index_data($applicationModel->orderBy('name', 'asc')
				->findAll(), 'id');
		}else{
			$data['targets'] = (new TargetService())->forUserId(session()->get('user_id'));
			$data['applicationCollection'] = index_data($applicationModel
				->where('owner', session()->get('user_id'))->orderBy('name', 'asc')
				->findAll(), 'id');
		}

		return $this->view('Generated/Target/listtargets', $data, 'Target');
	}

	
	/**
	 * Suppression d'un Target
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$targetModel = new \App\Models\TargetModel();
		$targetModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Target.message.confirm.deleted'));
		return redirect()->to('Generated/Target/listtargets/index'); 
	}

}
?>
