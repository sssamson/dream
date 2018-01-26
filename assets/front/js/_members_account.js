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
      form : '#data_form_credentails',
      onSuccess : function($form) {
        self.process_form('#data_form_credentails');
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
    var self = this;
    var form_contents = {};
    jQuery.each(jQuery(div_id).serializeArray(), function(i, field) {
      form_contents[field.name] = field.value;
    });
    if (div_id == '#data_form_credentails') {
      self.save_form_credentails(form_contents);
    } else {
      self.save_form_account(form_contents);
    }
  },

  save_form_credentails: function(form_contents) {

    jQuery.ajax({
        url: '/member/update_credentails',
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
            jQuery('.modal-body').html('Credentails has been updated');
            jQuery('#modal').modal('show');
          } else {
            jQuery('.modal-title').html('Error');
            jQuery('.modal-body').html(data.message);
            jQuery('#modal').modal('show');
          }
        },
        complete : function() {
          jQuery('#password_1').val('');
          jQuery('#password_2').val('');
          after_send('#form_validate');
        }
    });
  },

  save_form_account: function(form_contents) {

    jQuery.ajax({
        url: '/member/update_account',
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
            jQuery('.modal-body').html('Credentails has been updated');
            jQuery('#modal').modal('show');
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  }
}
