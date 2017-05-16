'use strict';

import {field} from "./Services/field";
import {utils} from "./Services/utils";

$(document).ready(function(){
	field.initAutocomplete();
	field.initActiveField();
	field.initStoreIngredient();

	$('#submit').on('click', function() {
		$.ajax({
			type: 'POST',
			url: '/recipe/new',
			data: $("#recipe").serialize(),
			beforeSend:function() {
				$( ".alert-danger" ).remove();
			},
			success: function(data) {
				if (!data.error) { location.href='/recipe'; }

				utils.displayError('.main-content', data.error.name);
				$('#recipe')[0].reset();
		 	}
	 	});
	});
});

$('#add-field').on('click', function () {

	var row = $('#ingredients>tbody>tr').clone();

	field.cleanElement(row, '.ingredient-id');
	field.cleanElement(row, '.ingredient-name');
	field.cleanElement(row, '.ingredient-amount');

	$('#ingredients>tbody').append(row[0]);

	field.initAutocomplete();
	field.initActiveField();
	field.initStoreIngredient();
});