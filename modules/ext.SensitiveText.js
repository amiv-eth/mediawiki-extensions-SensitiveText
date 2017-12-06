// MediaWiki Extension: SensitiveText

function toggleHide(element) {
	if (element.innerHTML == element.getAttribute('data-text')) {
		element.innerHTML = '**********';
	} else {
		element.innerHTML = element.getAttribute('data-text');
	}
}