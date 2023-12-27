/* Javascript for createapplication_fancyview.php */



/**
 * Envoi du form : intercepter l'envoi pour mettre à jour la liste et fermer la modale
 */
$('#AddFormApplication').ajaxForm(function(data){
	// recuperation de l'objet sauvegardé en JSON
	// var objectSaved = JSON.parse(data);
	
	// fermeture de la modale
	$('#modal_createapplication').modal('hide');
});
