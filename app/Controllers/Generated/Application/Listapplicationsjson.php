<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Application;

use CodeIgniter\API\ResponseTrait;

class ListApplicationsJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Applications
	 */
	public function index($orderBy = 'name', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$applicationModel = new \App\Models\ApplicationModel();

		$data['applications'] = $applicationModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $applicationModel->pager;

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
		$applicationModel = new \App\Models\ApplicationModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $applicationModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$applicationModel = new \App\Models\ApplicationModel();
		$result = $applicationModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_name($name, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$applicationModel = new \App\Models\ApplicationModel();
		$result = $applicationModel->where('name', $name)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_code($code, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$applicationModel = new \App\Models\ApplicationModel();
		$result = $applicationModel->where('code', $code)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_owner($owner, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$applicationModel = new \App\Models\ApplicationModel();
		$result = $applicationModel->where('owner', $owner)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_name($name){
		$db      = \Config\Database::connect();
		$builder = $db->table('track_application');
		$builder->like('name', urldecode($name));

		$data['applicationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_code($code){
		$db      = \Config\Database::connect();
		$builder = $db->table('track_application');
		$builder->like('code', urldecode($code));

		$data['applicationCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
