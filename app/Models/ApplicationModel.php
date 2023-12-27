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

class ApplicationModel extends Model {
	
    protected $table      = 'track_application';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // identifiant système
		'name', // Nom pour l'utilisateur
		'code', // Code pour le système
		'owner', // Propriétaire de l'application
	];
    public static $empty = [
	'id' => '',
		'name' => '',
		'code' => '',
		'owner' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
