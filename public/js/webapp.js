$(function() {

	/*
	|--------------------------------------------------------------------------
	| Buttons
	|--------------------------------------------------------------------------
	|
	*/
	
	/*

	***** Button click example

	$('#myButton').on('click', function(e) {
        e.preventDefault();
        // code
    });

	*/



	/*
	|--------------------------------------------------------------------------
	| Forms
	|--------------------------------------------------------------------------
	|
	*/

	/*

	***** Form submit example

	$(document).on('submit','#myForm',function(evt) {

	    evt.preventDefault();

	    var form = $(this);

	    var url = form.attr('action');
	    var postData = form.serialize();

	    $.post(url, postData, function(o) {
	        if (o.result == 1) {
	            // ok
	        } else {
	            // error
	        }
	    }, 'json');

	});

	*/

	$(document).on('submit','.form-default-update',function(evt) {

	    evt.preventDefault();

	    var $form = $(this);

	    var url = $form.attr('action');
	    var postData = $form.serialize();

	    $.post(url, postData, function(result) {
	        if (result.code == 1) {
	            // ok
	            $form.children('.alert-container').html(alert_box({alertStyle: result.status, message: result.message}));
	        } else {
	            // error
	            $form.children('.alert-container').html(alert_box({alertStyle: result.status, message: result.message}));
	        }
	    }, 'json');

	});
	

	/*
	|--------------------------------------------------------------------------
	| Functions
	|--------------------------------------------------------------------------
	|
	*/

	/*

	***** Bootstrap alert boxes

	@param: {alertStyle: 'success', message: 'test'}
	@return: bootstrap alert html
	@example: $('.alert-container').html(alert_box({alertStyle: 'info', message: 'teste'}));

	*/

	function alert_box(obj) {
		
		switch(obj.alertStyle) {
			case 'error':
			obj.alertStyle = 'danger';
			break;
		}

		var alertHtml = '<div class="alert alert-'+obj.alertStyle+'" role="alert">'+obj.message+'</div>';
		return alertHtml;
	}

});