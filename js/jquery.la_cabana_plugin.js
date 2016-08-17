(function($){
	$.fn.extend({
		resetErrorMessages: function(errorMessages){
			for(var i=0; i < errorMessages.length; i++){
				var element = errorMessages[i];
				if ($(element).children().length > 0) {
					$(element).empty();
					$(element).hide();
				}
			}
		},
		openModalCustom: function(id){
			console.log(id);
			$(id).show();
		},
		closeModalCustom: function(id){
			console.log(id);
			$(id).hide();
		},
		showErrorDivMessage: function(values){
			var defaultValues = {
				divId: "",
				message: 'Hubo un error al procesar el mensaje'
			};

			options = $.extend(defaultValues, values);
			$(values.divId).append("<span>" + values.message + "</span>");
			$(values.divId).show();
		},
		validateForm: function(form){
			$(".errorForm").remove();
			$(':input', form).each(function() {
				console.log($(this));
				if($(this).is(":text") || $(this).attr("type") == "email" || $(this).is(":password")){

					if ($(this).val() == '') {
						$(this).after('<p class="errorForm">El campo no puede estar vacío</p>');
					}
				}
			});
			var errors = $(".errorForm");
			if(errors.length > 0){
				return false;
			}
			return true;
		},
		getHttpError: function(jqXHR, textStatus, errorThrown) {
			
			var error = new Object();
			error.erroodCode = jqXHR.status;

			if (jqXHR.status === 0) {
	            error.message = 'Problema de conección. Intente más tarde';
	        } else if (jqXHR.status == 404) {
	            error.message = 'Recuerso no encontrado.';
	        } else if (jqXHR.status == 500) {
	            error.message = 'Internal Server Error [500].';
	        } else if (errorThrown === 'parsererror') {
	            error.message = 'Error en parseo de la respuesta.';
	        } else if (errorThrown === 'timeout') {
	            error.message = 'Error de timeout.';
	        } else if (errorThrown === 'abort') {
	            error.message = 'Pedido Ajax abortado.';
	        } else {
	            error.message = 'Error no manejable.\n' + jqXHR.responseText;
	        }
	        return error;
		}
	});
})(jQuery)