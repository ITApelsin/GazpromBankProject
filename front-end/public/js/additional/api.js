let server = 'http://45.89.67.108:8080/api/';
let offers = {
  'GET': {
    'top': function() {
      $.ajax({
        async: false,
        type: 'GET',
        crossDomain: true,
        url: server + 'top-offers',
        data: {},
        response: 'JSON',
        success: function(response)
        {
        	return response;
        },
        error: function()
        {
        	console.log('ERROR');
        }
      });
    }
  }
};
