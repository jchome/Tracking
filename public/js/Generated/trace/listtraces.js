/* Javascript for listtraces_view.php */

function deleteTrace(id){
    if(!confirm('Voulez-vous supprimer ce Trace ?')){
		return;
	}
	$.ajax({
		url: base_url() + "Generated/trace/Gettracejson/delete/" + id,
		method: "GET",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		success: function (data) {
            // Reload the page
			document.location.href = document.location.origin + document.location.pathname + "?";
        }
    });
}
