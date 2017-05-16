'use strict';

var utils = {
	displayError: function(element, message) {
		$(element)
			.prepend(`<div class="alert alert-danger">
						<strong>Упс! Что-то пошло не так!</strong><br><br>
						<ul>
							<li>`+message+`</li>
						</ul>
					</div>`);
	}
};

export {utils};