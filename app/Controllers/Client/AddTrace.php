<?php 

namespace App\Controllers\Client;

use App\Models\ApplicationModel;
use App\Models\TargetModel;
use Exception;

/**
 * 
 */
class AddTrace extends \App\Controllers\AjaxController{

    /**
     * Called with
     * localhost:8080/index.php/Client/AddTrace/post/estelle-serenity/massages
     * 
     */
    public function post(){
        $application_code = $this->request->getPost('app');
        $target_code = $this->request->getPost('target');
        $detail = $this->request->getPost('detail');

        $data = $this->apply($application_code, $target_code, $detail);
        return $this->statusOK($data);
    }

    public function get($application_code, $target_code, $detail){
        $data = $this->apply($application_code, $target_code, $detail);
        return $this->statusOK($data);
    }

    public function img($application_code, $target_code){
        $agent = $this->request->getUserAgent();
        $detail = [
            "lang" => $this->lang(),
            "device-type" => $this->deviceType(),
            "browser" => $this->browser($agent),
            "platform" => $agent->getPlatform(),
            "ip" => $this->request->getIPAddress(),
            "country" => $this->country(),
        ];
        try {
            $data = $this->apply($application_code, $target_code, json_encode($detail));
            $this->response->setHeader('Content-Type', 'image/svg');
            return '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
                <svg
                viewBox="0 0 1 1"
                height="1px"
                width="1px">
                <g id="layer1" />
                <!-- '. print_r($data, true) .' -->
                </svg>';
        } catch (Exception $e) {
            return $this->statusFailure($e->getMessage());
        }
    }

    private function deviceType() {
        $isMobile = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        if($isMobile){
            return "mobile";
        }else{
            return "computer";
        }
    }

    private function country(){
        $ip = $this->request->getIPAddress();
        $location = file_get_contents('http://ip-api.com/json/' . $ip);
        $data_loc = json_decode($location);
        return $data_loc->country;
    }

    private function lang(){
        $fullLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        return substr($fullLang, 0, stripos($fullLang, ','));
    }

    private function browser($agent){
        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
        } elseif ($agent->isRobot()) {
            $currentAgent = $agent->getRobot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    }



    private function apply($application_code, $target_code, $detail){

        log_message('debug', "New trace for: \n".
            " - application_code=$application_code\n".
            " - target_code=$target_code"
        );
        $application = (new ApplicationModel)->asObject()
            ->where('code', $application_code)->first();
        if($application == null){
            throw new Exception("Application with code=" . $application_code . " not found.", 1);
        }
        $target = (new TargetModel)->asObject()
            ->where('app_id', $application->id)
            ->where('code', $target_code)
            ->first();
        if($target == null){
            throw new Exception("Target with code=" . $target_code . " not found ".
                "for application code=" . $application_code . ".", 1);
        }

        $data = [
            'dt_trace '=> null,
            'app_id' => $application->id,
            'target_id' => $target->id,
            'detail' => $detail
        ];
        
		$traceModel = new \App\Models\TraceModel();
		$traceModel->save($data);
		$data['id'] = $traceModel->getInsertID();
        log_message('debug', "New trace saved: ". print_r($data, true));
        return $data;
    }
}