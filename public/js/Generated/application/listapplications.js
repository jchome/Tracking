/* Javascript for listapplications_view.php */

function deleteApplication(id){
    if(!confirm('Voulez-vous supprimer ce Application ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/application/Getapplicationjson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
