const {
	__,
	_x,
	_n,
	_nx
} = wp.i18n;

(function($) {
	'use strict'
	var nlMail = $('input#subscribe-email'),
		userId = $('input#nl_user_id'),
		nlForm = $('form#subscribe-form'),
		ppChecker = nlForm.find('#subscribe_policy'),
		subscribeSubmit = $('button#subscribe-submit');

	ppChecker.on('change', function() {
		if (this.checked) {
			subscribeSubmit.prop('disabled', false);
		} else {
			subscribeSubmit.prop('disabled', true);
		}
	});

	nlMail.on('keyup change', function() {
		if ('' == this.value || undefined == this.value || null == this.value) {
			userId.val('');
		} else {
			userId.val(md5(this.value));
		}
	});

	var alertHtml = function alertHtml(type, title, message) {
		type = (typeof type !== 'undefined') ? type : 'info';
		title = (typeof title !== 'undefined') ? title : false;
		var html = '<div class="valtenna-alert ' + type + '">';
		html += title ? '<h3>' + title + '</h3>' : '';
		html += '<div class="message">' + message + '</div>';
		html += '</div>';
		return html;
	}

	nlForm.validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			email: {
				required: __('Questo campo è obbligatorio', 'valtenna'),
				email: __('Inserisci un indirizzo e-mail valido', 'valtenna')
			}
		},
		submitHandler: function(form) {
			nlMail.prop('readonly', true);
			form.classList.add('submitting');
			var formdata = $(form).serialize();
			_iub.cons_instructions.push(["submit", {
				writeOnLocalStorage: false, // default: false
				form: {
					selector: form,
				},
				consent: {
					legal_notices: [{
						identifier: 'privacy_policy',
					}],
				}
			}, {
				success: function(success_response) {
					$.post(valtenna.ajaxurl, formdata, function(response) {
						nlMail.prop('readonly', false);
						form.classList.remove('submitting');
						var result = response.result;
						if (true === result) {
							$.fancybox.open(alertHtml('success', __('Perfetto!', 'valtenna'), __('La tua iscrizione è stata effettuata con successo.', 'valtenna')));
						} else {
							var errorcode = response.code,
								errorTitle = __('Errore!', 'valtenna'),
								errorMessage;
							switch (errorcode) {
								case 'mailchimp_error':
									errorMessage = __('Siamo spiacenti, ma qualcosa è andato storto durante il tentativo di iscrizione.<br/><br/>Dettaglio errore:<br/> %errordetail%', 'valtenna');
									errorMessage = errorMessage.replace('%errordetail%', response.data);
									break;
								case 'email_exists':
									errorMessage = __('Questo indirizzo e-mail sembra già essere presente nel nostro database.', 'valtenna');
									break;
								default:
									errorMessage = __('Si è verificato un problema tecnico. Riprova più tardi. Grazie.', 'valtenna');
									break;
							}
							$.fancybox.open(alertHtml('error', errorTitle, errorMessage));
						}
					});
				},
				error: function(error_response) {
					nlMail.prop('readonly', false);
					form.classList.remove('submitting');
					$.fancybox.open(alertHtml('error', __('Errore!', 'valtenna'), __('Non ho potuto registrare il tuo consenso al trattamento dei dati personali e, quindi, registrare la tua iscrizione alla newsletter. Riprova più tardi. Grazie.', 'valtenna')));
				}
			}]);
		}
	});
})(jQuery);