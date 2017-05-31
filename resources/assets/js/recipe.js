'use strict';

import {utils} from "./Services/utils";
import {field} from "./Services/field";

$(document).ready(function(){
	field.initAutocomplete();
	field.initActiveField();
	field.initStoreIngredient();
	field.initUpdateRecipe();
	field.initDetachIngredient();

	$('#submit').on('click', function() {

		$.ajax({
			type: 'POST',
			url: '/recipe/new',
			data: $("#recipe").find(":input").filter(function () {
            	return (($.trim(this.value).length > 0) && !$(this).hasClass('ingredient-name'))
        	}).serialize(),
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

	if (field.counter === 0) {
		field.counter = Number($('tbody tr:last').attr('id')) + 1;
	}

	field.cleanElement(row, '.ingredient-id');
	field.cleanElement(row, '.ingredient-name');
	field.cleanElement(row, '.ingredient-amount');

	$('#ingredients>tbody').append(row[0]);

	field.initAutocomplete();
	field.initActiveField();
	field.initStoreIngredient();
	field.initDetachIngredient();
});