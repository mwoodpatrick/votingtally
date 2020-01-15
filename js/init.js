jQuery(function($) {
	$('#swpajax-form').on('submit', function(e) {
		e.preventDefault();

		var inputName = $(this).find('#swpajax-name').val();
		console.log('Name submitted');
		console.log(inputName);
	});
});