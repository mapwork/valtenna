(function($) {
	'use strict'
	var nlMail = $('input#subscribe-email'),
		userId = $('input#nl_user_id'),
		nlForm = $('form#subscribe-form');

	nlMail.on('keyup change', function() {
		if ('' == this.value || undefined == this.value || null == this.value) {
			userId.val('');
		} else {
			userId.val(md5(this.value));
		}
	});

	nlForm.validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		}
	});
})(jQuery);