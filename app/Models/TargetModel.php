<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

namespace App\Models;
use CodeIgniter\Model;

class TargetModel extends Model {
	
    protected $table      = 'track_target';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // identifiant système
		'app_id', // lien vers l'application
		'name', // Nom compréhensible par l'utilisateur
		'code', // Nom technique
		'selector', // Selecteur dans la page
	];
    public static $empty = [
	'id' => '',
		'app_id' => '',
		'name' => '',
		'code' => '',
		'selector' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
