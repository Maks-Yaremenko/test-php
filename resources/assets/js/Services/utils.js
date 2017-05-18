'use strict';

var utils = {
	displayError: function(element, data) {
		var message = 'Упс! Что-то пошло не так!';
		var output =  '<div class="alert alert-danger"><strong>'+ message +'</strong><br><br><ul>';
		
		for (var key in data) {
			output += '<li>'+ key + ' : ' + data[key] + '</li>';
		}

		output += '</ul></div>';

		$(element).prepend(output);
	}
};

export {utils};