<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Target;

class GetTargetJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$targetModel = new \App\Models\TargetModel();
		$result = $targetModel->find($id);
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
		$model = $this->targetservice->getUnique($this->db, $id);
		$data['target'] = $model;

		$data['applicationCollection'] = $this->applicationservice->getAll($this->db,'name');		
	
		$this->load->view('target/edittarget_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Target
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\TargetModel();
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
