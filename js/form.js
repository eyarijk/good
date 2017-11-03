$(document).ready(function() {

	$('form').not('.noplay').submit(function(event) {
		

		var json;
		event.preventDefault();

		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.go) {
					go(json.go);
				} else {
					swal(json.title, json.text, json.status);
				}
			},
		});
	
	});

});

function go(url) {
	window.location.href = '/' + url;
}
