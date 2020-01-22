function loadPage(templateURL, contentLoaderFunction) {
	sendRequest(templateURL, function(data) {
		$('body').append(data);
		sendRequest('menu.html', function(data) {
			$('#menu').html(data);
			contentLoaderFunction();
		});
	});
}
