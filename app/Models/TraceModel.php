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

class TraceModel extends Model {
	
    protected $table      = 'track_trace';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // identifiant interne
		'dt_trace', // Date de la trace
		'app_id', // Application tracée
		'target_id', // Lien vers la cible
		'detail', // Détail sur le marquage
	];
    public static $empty = [
	'id' => '',
		'dt_trace' => '',
		'app_id' => '',
		'target_id' => '',
		'detail' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
