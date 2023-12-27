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

class UserModel extends Model {
	
    protected $table      = 'track_user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // identifiant système
		'name', // Nom de l'utilisateur
		'login', // Login de connexion
		'password', // Mot de passe de connexion
		'email', // E-mail de l'utilisateur
	];
    public static $empty = [
	'id' => '',
		'name' => '',
		'login' => '',
		'password' => '',
		'email' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
