<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Trace;

use CodeIgniter\API\ResponseTrait;

class ListTracesJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Traces
	 */
	public function index($orderBy = 'dt_trace', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();

		$data['traces'] = $traceModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $traceModel->pager;

		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);

	}

	/**
	 * Get all objects having the key in the list $listOfKeys (string separated by ',')
	 * 
	 */
	public function getAll_id($listOfKeys, $orderBy = null){
		$traceModel = new \App\Models\TraceModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $traceModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();
		$result = $traceModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_dt_trace($dt_trace, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();
		$result = $traceModel->where('dt_trace', $dt_trace)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_app_id($app_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();
		$result = $traceModel->where('app_id', $app_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_target_id($target_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();
		$result = $traceModel->where('target_id', $target_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_detail($detail, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$traceModel = new \App\Models\TraceModel();
		$result = $traceModel->where('detail', $detail)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_detail($detail){
		$db      = \Config\Database::connect();
		$builder = $db->table('track_trace');
		$builder->like('detail', urldecode($detail));

		$data['traceCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
