<?php 

namespace App\Controllers\Admin;

use App\Libraries\TraceService;

/**
 * 
 */
class Stats extends \App\Controllers\AjaxController{

    /**
     * Dates should be 'yyyy-mm-dd'
     */
    public function index($appId, $startDate, $endDate = null){
        $service = new TraceService();
        return $this->statusOK($service->forAppId($appId, $startDate, $endDate));
    }

    
}