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
    
    // form validator
    $.validate({
      modules: 'security',
      form : '#data_form_password',
      onSuccess : function($form) {
        self.process_form('#data_form_password');
      }
    });

    $.validate({
      form : '#data_form_account',
      onSuccess : function($form) {
        self.process_form('#data_form_account');
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
    if (div_id == '#data_form_password') {
      self.save_form_password(form_contents);
    } else {
      self.save_form_account(form_contents);
    }
  },

  save_form_password: function(form_contents) {

    url = "/member/update_password";

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
            jQuery('.modal-title').html('Updated');
            jQuery('.modal-body').html('Password has been updated');
            jQuery('#modal').modal('show');
          } else {

          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  },

  save_form_account: function(form_contents) {

    url = "/member/login";
 
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
            window.location.href = data.url;
          } else {
            jQuery('#login_error').show();
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  }
}
