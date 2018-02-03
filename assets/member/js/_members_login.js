$().ready(function() {
  var members = new Members();
});

function Members() {
  var self = this;
  self.bind_actions();
}

Members.prototype = {
  bind_actions : function() {
    var self = this;

    $('#login_error').hide();

    // form validator
    $.validate({
      form : '#data_form_login',
      onSuccess : function($form) {
        self.process_form('#data_form_login');
      }
    });

    $.validate({
      form : '#data_form_register',
      onSuccess : function($form) {
        self.process_form('#data_form_register');
      }
    });

  },

  process_form: function(div_id) {
    jQuery('#login_error').hide();
    var self = this;
    var form_contents = {};
    jQuery.each(jQuery(div_id).serializeArray(), function(i, field) {
      form_contents[field.name] = field.value;
    });
    self.save_form(form_contents);
  },

  save_form: function(form_contents) {

    if (form_contents['type'] = 'login') {
      url = "/member/main/login";
    } else if (form_contents['type'] = 'register') {
      next_page = "/member/main/register";
    }

    jQuery.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
          'form_values': JSON.stringify(form_contents)
        },
        beforeSend: function() {
          before_send('#form_validate');
        },
        success: function(data) {
          if (data.status == true) {
            if (form_contents['type'] = 'login') {
              window.location.href = data.url;
            } else if (form_contents['type'] = 'register') {
              next_page = "/member/main/register";
            }
          } else {
            if (form_contents['type'] = 'login') {
              jQuery('#login_error').show();
            } else if (form_contents['type'] = 'register') {
              next_page = "/member/main/register";
            }
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  }
}
