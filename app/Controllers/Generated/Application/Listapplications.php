<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Application;

class ListApplications extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Applications
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'name';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$applicationModel = new \App\Models\ApplicationModel();

		$data['applications'] = $applicationModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $applicationModel->pager;


		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = index_data($userModel->orderBy('name', 'asc')
			->findAll(), 'id');

		return $this->view('Generated/Application/listapplications', $data, 'Application');
	}

	
	/**
	 * Suppression d'un Application
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$applicationModel = new \App\Models\ApplicationModel();
		$applicationModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/Application.message.confirm.deleted'));
		return redirect()->to('Generated/Application/listapplications/index'); 
	}

}
?>
