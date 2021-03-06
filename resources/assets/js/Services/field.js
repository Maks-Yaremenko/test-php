'use strict';

import {utils} from "./utils";

var field = {

	counter: 0,

	cleanElement: function (target, className) {

		var param = (className === '.ingredient-id') ? 'ingredient_id' : className.split('-')[1];

		if ($(target).find(className).is('span')) {
			return $(target).find(className)
				.replaceWith($('<input type="text" class="form-control ingredient-name"></input>'))
				.attr('name', 'ingredient['+this.counter+']['+param+']');
		}

		$(target).find(className).val('').attr('name', 'ingredient['+this.counter+']['+param+']');
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
	},

	initUpdateRecipe: function() {

		$('#update-recipe').on('click', function() {

			var id = $('#recipe-id').val();

			$.ajax({
				type: 'PUT',
				url: `/recipe/${id}`,
				data: $("#recipe").find(":input").filter(function () {
            		return (($.trim(this.value).length > 0) && !$(this).hasClass('ingredient-name'))
        		}).serialize(),
				beforeSend:function() {
					$( ".alert-danger" ).remove();
				},
				success: function(data) {
					//location.href='/recipe/show/' + data.id;
				},
			 	error: function(err) {
			 		utils.displayError('.main-content', err.responseJSON);
			 	}
			});
		});

	},

	initDetachIngredient: function() {
		$('.detach-ingredient').on('click', function(event) {
			event.preventDefault();
			$(this).parent().parent().remove();
		})
	}

};

export {field};