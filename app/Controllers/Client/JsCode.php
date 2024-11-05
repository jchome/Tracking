<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ApplicationModel;
use App\Models\TargetModel;

/**
 * Renders the javbascript code for an application
 */
class JsCode extends BaseController {

    public function index($application_code){
        $application = (new ApplicationModel)->asObject()
            ->where('code', $application_code)->first();
        $this->response->setHeader('Content-Type', 'application/javascript');

        if($application == null){
            return "alert('error: Application with code=" . $application_code . " not found.')";
        }

        // Get all targets of the application
        $targets = (new TargetModel())->asObject()->where('app_id', $application->id)->findAll();
        foreach($targets as $target){
            if($target->selector == ""){
                continue;
            }
            echo ' 
(new Image()).src="'. base_url() .'/Client/AddTrace/img/'.$application_code.'/index/?v='.time().'";
document.querySelector(\''. $target->selector .'\').addEventListener(\'click\', (event) => {
    (new Image()).src="'. base_url() .'/Client/AddTrace/img/'.$application_code
            .'/'. $target->code .'/?v='.time().'";
});
';
        }
        return;
        
    }
}