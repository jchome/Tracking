<?php 

namespace App\Controllers\Admin;


/**
 * 
 */
class Info extends \App\Controllers\HtmlController{

    public function index(){
        $this->view('Admin/info', [], 'Graphiques');
    }

}