<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class TargetTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('TargetService');
		$this->load->model('TargetModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$targets = $this->targetservice->getAll($this->db);
		foreach ($targets as $target) {
			$this->targetservice->deleteByKey($this->db, $target->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$targets = $this->targetservice->getAll($this->db);
		foreach ($targets as $target) {
			$this->targetservice->deleteByKey($this->db, $target->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getTarget, delete";
		// création d'un enregistrement
		$target_insert = new TargetModel();
		// Nothing for field id
		$target_insert->app_id = 0;
		$target_insert->name = 'test_0';
		$target_insert->code = 'test_0';
		$target_insert->selector = 'test_0';
		$this->targetservice->insertNew($this->db, $target_insert);
		// $target_insert->id est maintenant affecté
	
		$target_select = $this->targetservice->getUnique($this->db, $target_insert->id);
	
		$this->_assert_equals($target_select->id, $target_insert->id);
		$this->targetservice->deleteByKey($this->db, $target_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getTarget, delete";

		$target_insert = new TargetModel();
		// Nothing for field id
		$target_insert->app_id = 0;
		$target_insert->name = 'test_0';
		$target_insert->code = 'test_0';
		$target_insert->selector = 'test_0';
		$this->targetservice->insertNew($this->db, $target_insert);
	
		$target_update = $this->targetservice->getUnique($this->db, $target_insert->id);
		// Nothing for field id
		$target_update->app_id = 90;
		$target_update->name = 'test1_0';
		$target_update->code = 'test1_0';
		$target_update->selector = 'test1_0';
		$this->targetservice->update($this->db, $target_insert);
	
		$target_update = $this->targetservice->getUnique($this->db, $target_insert->id);
		
		if(!$this->_assert_equals($target_insert->id, $target_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($target_insert->app_id, $target_update->app_id)) {
			return false;
		}
		if(!$this->_assert_equals($target_insert->name, $target_update->name)) {
			return false;
		}
		if(!$this->_assert_equals($target_insert->code, $target_update->code)) {
			return false;
		}
		if(!$this->_assert_equals($target_insert->selector, $target_update->selector)) {
			return false;
		}

		$this->targetservice->deleteByKey($this->db, $target_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countTargetsAvant = $this->targetservice->count($this->db);
	
		// création d'un enregistrement
		$target = new TargetModel();
		// Nothing for field id
		$target->app_id = 0;
		$target->name = 'test_0';
		$target->code = 'test_0';
		$target->selector = 'test_0';
		$this->targetservice->insertNew($this->db, $target);
	
		// comptage pour vérification : après insertion
		$countTargetsApres = $this->targetservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countTargetsAvant +1, $countTargetsApres);
	
		// recupération de l'objet par son  id
		$target = $this->targetservice->getUnique($this->db, $target->id);
	
		// suppression de l'enregistrement
		$this->targetservice->deleteByKey($this->db, $target->id);
	
		// comptage pour vérification : après suppression
		$countTargetsFinal = $this->targetservice->count($this->db);
		$this->_assert_equals($countTargetsAvant, $countTargetsFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$target_insert = new TargetModel();
		// Nothing for field id
		$target_insert->app_id = 0;
		$target_insert->name = 'test_0';
		$target_insert->code = 'test_0';
		$target_insert->selector = 'test_0';
		$this->targetservice->insertNew($this->db, $target_insert);
	
		$targets = $this->targetservice->getAll($this->db);
		if( ! $this->_assert_not_empty($targets) ) {
			log_message('DEBUG', '[UNIT TEST / Targettest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($targets as $target) {
			if($target->id == $target_insert->id &&
					$this->_assert_equals($target->app_id, $target_insert->app_id ) && 
					$this->_assert_equals($target->name, $target_insert->name ) && 
					$this->_assert_equals($target->code, $target_insert->code ) && 
					$this->_assert_equals($target->selector, $target_insert->selector )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->targetservice->deleteByKey($this->db, $target->id);
			log_message('DEBUG', '[UNIT TEST / Targettest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Targettest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
