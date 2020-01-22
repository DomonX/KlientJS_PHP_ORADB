async function sendRequest(endpointUrl, callback) {
	$.ajax({
		url: endpointUrl,
		context: document.body,
		success: function(data) {
			callback(data);
		},
		error: function(data) {
			callback(data);
		}
	});
}
