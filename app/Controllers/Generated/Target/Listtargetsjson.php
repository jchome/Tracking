<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Target;

use CodeIgniter\API\ResponseTrait;

class ListTargetsJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Targets
	 */
	public function index($orderBy = 'app_id', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();

		$data['targets'] = $targetModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $targetModel->pager;

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
		$targetModel = new \App\Models\TargetModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $targetModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();
		$result = $targetModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_app_id($app_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();
		$result = $targetModel->where('app_id', $app_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_name($name, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();
		$result = $targetModel->where('name', $name)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_code($code, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();
		$result = $targetModel->where('code', $code)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_selector($selector, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$targetModel = new \App\Models\TargetModel();
		$result = $targetModel->where('selector', $selector)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_name($name){
		$db      = \Config\Database::connect();
		$builder = $db->table('track_target');
		$builder->like('name', urldecode($name));

		$data['targetCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_code($code){
		$db      = \Config\Database::connect();
		$builder = $db->table('track_target');
		$builder->like('code', urldecode($code));

		$data['targetCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_selector($selector){
		$db      = \Config\Database::connect();
		$builder = $db->table('track_target');
		$builder->like('selector', urldecode($selector));

		$data['targetCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
