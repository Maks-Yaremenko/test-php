'use strict';

$(document).ready(function(){
	field.initAutocomplete();
})

$('#add-field').on('click', function () {

	var row = $('#ingredients>tbody>tr').clone();

	field.getElement(row, '.ingredient-id').setNextFieldNumber('id');
	field.getElement(row, '.ingredient-name').resetValue().setNextFieldNumber('name');
	field.getElement(row, '.ingredient-amount').resetValue().setNextFieldNumber('amount');

	$('#ingredients>tbody').append(row[0]);

	field.initAutocomplete();

});

$('#submit').on('click', function() {
	$.ajax({
	  type: 'POST',
	  url: '/recipe/new',
	  data: $("#recipe").serialize(),
	  success: function(data) {
	  	location.reload();
	  }
	});
});

var field = {

	element: false,
	counter: 1,

	getElement: function (target, fieldName) {

		this.element = $(target).find(fieldName);
		return this;
	},

	resetValue: function () {

		this.element.val('');
		return this;
	},

	setNextFieldNumber: function (fieldName) {

		this.element.attr('name', 'ingredient['+this.counter+']['+fieldName+']');
		
		if (fieldName === 'amount') { this.counter++; }
		return this;
	},

	initAutocomplete: function() {
		$('.ingredient-name').on('focus', function(){
			$(this).autocomplete({
		        source: '/ingredient/autocomplete',
		        minLength: 3,
		        select: function(event, ui) {
		            $(this).val(ui.item.value);
		            $(this).siblings().val(ui.item.id);
		        }
		    });
		});
	}
}