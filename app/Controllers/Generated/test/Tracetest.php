<?php
/*
 * Created by generator
 *
 */
require_once(APPPATH . '/controllers/test/Toast.php');

class TraceTest extends Toast {

	function __construct(){
		parent::__construct();
		$this->load->database('test');
		
		$this->load->library('TraceService');
		$this->load->model('TraceModel');
		
	}
	
	/**
	 * OPTIONAL; Anything in this function will be run before each test
	 * Good for doing cleanup: resetting sessions, renewing objects, etc.
	 */
	function _pre() {
		$traces = $this->traceservice->getAll($this->db);
		foreach ($traces as $trace) {
			$this->traceservice->deleteByKey($this->db, $trace->id);
		}
	}
	
	
	/**
	 * OPTIONAL; Anything in this function will be run after each test
	 * I use it for setting $this->message = $this->MyModel->getError();
	 */
	function _post() {
		$traces = $this->traceservice->getAll($this->db);
		foreach ($traces as $trace) {
			$this->traceservice->deleteByKey($this->db, $trace->id);
		}
	}
	
	public function test_insert(){
		$this->message = "Tested methods: save, getTrace, delete";
		// création d'un enregistrement
		$trace_insert = new TraceModel();
		// Nothing for field id
		$trace_insert->dt_trace = '';
		$trace_insert->app_id = 0;
		$trace_insert->target_id = 0;
		$trace_insert->detail = 'test_0';
		$this->traceservice->insertNew($this->db, $trace_insert);
		// $trace_insert->id est maintenant affecté
	
		$trace_select = $this->traceservice->getUnique($this->db, $trace_insert->id);
	
		$this->_assert_equals($trace_select->id, $trace_insert->id);
		$this->traceservice->deleteByKey($this->db, $trace_select->id);
	}
	
	
	public function test_update(){
		$this->message = "Tested methods: save, update, getTrace, delete";

		$trace_insert = new TraceModel();
		// Nothing for field id
		
		$trace_insert->app_id = 0;
		$trace_insert->target_id = 0;
		$trace_insert->detail = 'test_0';
		$this->traceservice->insertNew($this->db, $trace_insert);
	
		$trace_update = $this->traceservice->getUnique($this->db, $trace_insert->id);
		// Nothing for field id
		
		$trace_update->app_id = 90;
		$trace_update->target_id = 90;
		$trace_update->detail = 'test1_0';
		$this->traceservice->update($this->db, $trace_insert);
	
		$trace_update = $this->traceservice->getUnique($this->db, $trace_insert->id);
		
		if(!$this->_assert_equals($trace_insert->id, $trace_update->id)) {
			return false;
		}
		if(!$this->_assert_equals($trace_insert->dt_trace, $trace_update->dt_trace)) {
			return false;
		}
		if(!$this->_assert_equals($trace_insert->app_id, $trace_update->app_id)) {
			return false;
		}
		if(!$this->_assert_equals($trace_insert->target_id, $trace_update->target_id)) {
			return false;
		}
		if(!$this->_assert_equals($trace_insert->detail, $trace_update->detail)) {
			return false;
		}

		$this->traceservice->deleteByKey($this->db, $trace_insert->id);
	}
	
	
	public function test_count(){
		$this->message = "Tested methods: count, save, getUnique, deleteByKey";
	
		// comptage pour vérification : avant
		$countTracesAvant = $this->traceservice->count($this->db);
	
		// création d'un enregistrement
		$trace = new TraceModel();
		// Nothing for field id
		
		$trace->app_id = 0;
		$trace->target_id = 0;
		$trace->detail = 'test_0';
		$this->traceservice->insertNew($this->db, $trace);
	
		// comptage pour vérification : après insertion
		$countTracesApres = $this->traceservice->count($this->db);
	
		// verification d'ajout d'un enregistrement
		$this->_assert_equals($countTracesAvant +1, $countTracesApres);
	
		// recupération de l'objet par son  id
		$trace = $this->traceservice->getUnique($this->db, $trace->id);
	
		// suppression de l'enregistrement
		$this->traceservice->deleteByKey($this->db, $trace->id);
	
		// comptage pour vérification : après suppression
		$countTracesFinal = $this->traceservice->count($this->db);
		$this->_assert_equals($countTracesAvant, $countTracesFinal);
	
	}
	
	
	function test_list(){
		$this->message = "Tested methods: save, getAll, delete";
	
		$trace_insert = new TraceModel();
		// Nothing for field id
		
		$trace_insert->app_id = 0;
		$trace_insert->target_id = 0;
		$trace_insert->detail = 'test_0';
		$this->traceservice->insertNew($this->db, $trace_insert);
	
		$traces = $this->traceservice->getAll($this->db);
		if( ! $this->_assert_not_empty($traces) ) {
			log_message('DEBUG', '[UNIT TEST / Tracetest.php)] #test_list : getAll after insert != 1');
			return $this->_fail('getAll after insert != 1');
		}
		$found = 0;
		foreach ($traces as $trace) {
			if($trace->id == $trace_insert->id &&
					$this->_assert_equals($trace->dt_trace, $trace_insert->dt_trace ) && 
					$this->_assert_equals($trace->app_id, $trace_insert->app_id ) && 
					$this->_assert_equals($trace->target_id, $trace_insert->target_id ) && 
					$this->_assert_equals($trace->detail, $trace_insert->detail )
				){
				$found++;
			}
		}
		if( $found == 1 ){
			$this->traceservice->deleteByKey($this->db, $trace->id);
			log_message('DEBUG', '[UNIT TEST / Tracetest.php)] #test_list : OK');
			return $this->_assert_true(True);
		}else{
			log_message('DEBUG', '[UNIT TEST / Tracetest.php)] #test_list : found != 1');
			return $this->_fail('found != 1');
		}
	}

}
?>
