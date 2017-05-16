'use strict';

var field = {

	counter: 1,

	cleanElement: function (target, className) {
		$(target).find(className).val('').attr('name', 'ingredient['+this.counter+']['+className.split('-')[1]+']');
		if (className.split('-')[1] === 'amount') { this.counter++; }
	},

	showAddButton: function () {
		$('.target.active').css('display', 'table');
    	$('.target.active > input').css({'border-radius': '4px 0 0 4px'})
    	$('.target.active .input-group-btn').css('display', 'table-cell');
    	$('#add-field').attr('disabled', '');
	},

	hideAddButton: function () {
		$('.target.active').css({'display':'block'})
		$('.target.active > input').css({'border-radius': '4px'})
		$('.target.active .input-group-btn').css({'display': 'none'});
		$('#add-field').removeAttr('disabled');
	},

	hideButtonAfterStoreIngredient: function () {
		$('.target').css({'display':'block'})
		$('.target > input').css({'border-radius': '4px'})
		$('.target .input-group-btn').css({'display': 'none'});
		$('#add-field').removeAttr('disabled');
	},

	initAutocomplete: function() {

		var self = this;

		$('.ingredient-name').on('focus', function(){
			$(this).autocomplete({
		        source: '/ingredient/autocomplete',
		        minLength: 3,
		        select: function(event, ui) {
		        	
		            $(this).val(ui.item.value);
		            $(this).siblings().val(ui.item.id);
		        },
		        response: function( event, ui ) {
		        	if (ui.content.length) {
		        		self.hideAddButton();
		        		return false;
		        	}
		        	
		        	self.showAddButton();
		        }
		    });
		});
	}, 

	initActiveField: function() {
		$('.ingredient-name')
			.on('focus', function(){
				$(this).parent().addClass('active');
			})
			.on('blur', function(){
				$(this).parent().removeClass('active');
			})
	},

	initStoreIngredient: function() {
		var parent = this;

		$('.add-ingredient').on('click', function() {
			var self = this;
			var newIngredient = $(this).parent().siblings('.ingredient-name').val();

			$.ajax({
				type: 'POST',
				url: '/ingredient',
				data: {"name": newIngredient },
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				success: function(data) {
					$(self).parent().siblings('.ingredient-id').val(data.id);
					parent.hideButtonAfterStoreIngredient();
				}
			});
		});
	}
};

export {field};