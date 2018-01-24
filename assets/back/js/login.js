$().ready(function() {
	var login = new Login();
});

function Login() {
	var self = this;
	form_id = '#login_form';
	form_submit_id = '#login_sign_up';
	self.bind_actions();
}

Login.prototype = {
	bind_actions : function() {
		var self = this;
		
		jQuery('.log-error').hide();
		
		var type = window.location.hash.substr(1);
		if (type == 'session') {
			jQuery('#session_error').show();
		}

		$.validate({
		  form : form_id,
		  onSuccess : function($form) {
		  	self.process_form();
	    }
		});
	},

	process_form: function() {
		var self = this;
		var form_contents = {};
		jQuery.each(jQuery(form_id).serializeArray(), function(i, field) {
			form_contents[field.name] = field.value;
		});

		self.validate_login(form_contents);
	},

	validate_login: function(form_contents) {
    jQuery.ajax({
        url: '/admin/main/dologin',
        type: 'POST',
        dataType: 'json',
        data: {
            'form_values': JSON.stringify(form_contents)
        },
        beforeSend: function() {
          before_send(form_submit_id);
        },
        success: function(data) {
          console.log(data);
          if (data.status == true) {
          	window.location.href = data.url;    
          } else {
            jQuery('#email, #password').val(''); // clear fields
            jQuery('#login_error').html(data.message);
          	jQuery('#login_error').show();
          }
        },
        complete : function() {
          after_send(form_submit_id,'Login');
        }
    });
	}
}
