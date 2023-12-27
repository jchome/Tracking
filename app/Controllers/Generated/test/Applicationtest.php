<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class ApplicationTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('ApplicationService');
		$this->load->model('ApplicationModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$applications = $this->applicationservice->getAll($this->db);
		foreach ($applications as $application) {
			$this->applicationservice->deleteByKey($this->db, $application->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$applications = $this->applicationservice->getAll($this->db);
		foreach ($applications as $application) {
			$this->applicationservice->deleteByKey($this->db, $application->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getApplication, delete";
		// création d'un enregistrement
		$application_insert = new ApplicationModel();
		// Nothing for field id
		$application_insert->name = 'test_0';
		$application_insert->code = 'test_0';
		$application_insert->owner = 0;
		$this->applicationservice->insertNew($this->db, $application_insert);
		// $application_insert->id est maintenant affecté
	
		$application_select = $this->applicationservice->getUnique($this->db, $application_insert->id);
	
		$this->_assert_equals($application_select->id, $application_insert->id);
		$this->applicationservice->deleteByKey($this->db, $application_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getApplication, delete";

		$application_insert = new ApplicationModel();
		// Nothing for field id
		$application_insert->name = 'test_0';
		$application_insert->code = 'test_0';
		$application_insert->owner = 0;
		$this->applicationservice->insertNew($this->db, $application_insert);
	
		$application_update = $this->applicationservice->getUnique($this->db, $application_insert->id);
		// Nothing for field id
		$application_update->name = 'test1_0';
		$application_update->code = 'test1_0';
		$application_update->owner = 90;
		$this->applicationservice->update($this->db, $application_insert);
	
		$application_update = $this->applicationservice->getUnique($this->db, $application_insert->id);
		
		if(!$this->_assert_equals($application_insert->id, $application_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($application_insert->name, $application_update->name)) {
			return false;
		}
		if(!$this->_assert_equals($application_insert->code, $application_update->code)) {
			return false;
		}
		if(!$this->_assert_equals($application_insert->owner, $application_update->owner)) {
			return false;
		}

		$this->applicationservice->deleteByKey($this->db, $application_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countApplicationsAvant = $this->applicationservice->count($this->db);
	
		// création d'un enregistrement
		$application = new ApplicationModel();
		// Nothing for field id
		$application->name = 'test_0';
		$application->code = 'test_0';
		$application->owner = 0;
		$this->applicationservice->insertNew($this->db, $application);
	
		// comptage pour vérification : après insertion
		$countApplicationsApres = $this->applicationservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countApplicationsAvant +1, $countApplicationsApres);
	
		// recupération de l'objet par son  id
		$application = $this->applicationservice->getUnique($this->db, $application->id);
	
		// suppression de l'enregistrement
		$this->applicationservice->deleteByKey($this->db, $application->id);
	
		// comptage pour vérification : après suppression
		$countApplicationsFinal = $this->applicationservice->count($this->db);
		$this->_assert_equals($countApplicationsAvant, $countApplicationsFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$application_insert = new ApplicationModel();
		// Nothing for field id
		$application_insert->name = 'test_0';
		$application_insert->code = 'test_0';
		$application_insert->owner = 0;
		$this->applicationservice->insertNew($this->db, $application_insert);
	
		$applications = $this->applicationservice->getAll($this->db);
		if( ! $this->_assert_not_empty($applications) ) {
			log_message('DEBUG', '[UNIT TEST / Applicationtest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($applications as $application) {
			if($application->id == $application_insert->id &&
					$this->_assert_equals($application->name, $application_insert->name ) && 
					$this->_assert_equals($application->code, $application_insert->code ) && 
					$this->_assert_equals($application->owner, $application_insert->owner )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->applicationservice->deleteByKey($this->db, $application->id);
			log_message('DEBUG', '[UNIT TEST / Applicationtest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Applicationtest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
