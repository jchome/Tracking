/* Javascript for listtargets_view.php */

function deleteTarget(id){
    if(!confirm('Voulez-vous supprimer ce Cible ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/target/Gettargetjson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
