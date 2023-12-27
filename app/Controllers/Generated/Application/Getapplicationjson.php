<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Application;

class GetApplicationJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$applicationModel = new \App\Models\ApplicationModel();
		$result = $applicationModel->find($id);
		if( $result == null ){
			return $this->statusError('NOT FOUND');
		} else{
			return $this->statusOK($result);
		}
	}

	/**
	 * Affichage des infos
	 */
	public function edit($id){
		/*
		$model = $this->applicationservice->getUnique($this->db, $id);
		$data['application'] = $model;

		$data['userCollection'] = $this->userservice->getAll($this->db,'name');		
	
		$this->load->view('application/editapplication_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Application
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\ApplicationModel();
		$result = $model->find($id);



		if($result == null){
			return $this->statusError('NOT FOUND');
		}else{
			$model->delete($id);
			return $this->statusOK('done');
		}

		
	}

}

?>
