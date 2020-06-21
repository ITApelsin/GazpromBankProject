jQuery(document).ready(function($) {

	$('#navbar-main [href]').each(function() {
    if(this.href == window.location.href) {
      $(this).addClass('active');
    }
  });

});

	// Функция отправки на обработчик
	function SendRequestText(object, JSON_parse)
	{
		var response = false;
		$.ajax({
			async: false,
            type: 'POST',
            url: new URL(window.location.href).origin + '/http.php',
            data: {'request': JSON.stringify(object)},
            response: 'JSON',
            beforeSend: function()
            {
            	$("body").append('<div class="w-100 h-100 fixed-top d-flex justify-content-center align-items-center" style="background:rgba(0, 0, 0, 0.7)" id="SendRequestText-loader"><div class="spinner-border text-light" style="width:3rem;height: 3rem"><span class="sr-only">Loading...</span></div></div>');
            },
            success: function(data)
            {
            	response = data;
            },
            error: function()
            {
            	console.log('[ERROR]: SendRequestText()');
            	$("SendRequestText-loader").remove();
            },
            complete: function()
            {
                $("#SendRequestText-loader").remove();
            }
        });

        if(JSON_parse == true)
        {
        	return jQuery.parseJSON(response);
        }
        else
        {
        	return response;
        }
	}
