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
				location.href='/recipe';
		 	},
		 	error: function(err) {
		 		utils.displayError('.main-content', err.responseJSON);
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