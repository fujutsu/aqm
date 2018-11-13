jQuery(function($){

	$(document).ready(function() {

		$("#form, #formUslugi, #formContacts").submit(function() {

			var data = {
				'action': 'bitrix24',
				'params': $(this).serialize()
			};
			
			$.ajax({
				type: "POST",
				url: myajax.url,
				data: data,
				success: function(data) {
				
					// First form clear
					$('#formName').val('');
					$('#formPhone').val('');
					
					// Uslugi form clear
					$('#formName2').val('');
					$('#formPhone2').val('');
					$('#formMail2').val('');
					
					// Contacts form clear
					$('#name').val('');
					$('#email').val('');
					$('#text').val('');
					
					$('#confirmForm, #confirmForm2, #confirmForm3').fadeIn(200);
					$('#confirmForm, #confirmForm2, #confirmForm3').fadeOut(8000);
					
					fbq('track', 'Lead');
				}
			});
			return false;
		});

	});
});