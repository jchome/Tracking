<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Trace;

class GetTraceJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$traceModel = new \App\Models\TraceModel();
		$result = $traceModel->find($id);
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
		$model = $this->traceservice->getUnique($this->db, $id);
		$data['trace'] = $model;

		$data['applicationCollection'] = $this->applicationservice->getAll($this->db,'name');
		$data['targetCollection'] = $this->targetservice->getAll($this->db,'name');		
	
		$this->load->view('trace/edittrace_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Trace
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\TraceModel();
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
