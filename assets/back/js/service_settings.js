$().ready(function() {
  var service = new Service();
});

function Service() {
  var self = this;
  self.bind_actions();
}

Service.prototype = {
  bind_actions : function() {
    var self = this;

    // form validator
    $.validate({
      form : '#data_form',
      onSuccess : function($form) {
        self.process_form();
      }
    });
  },

  process_form: function() {
    var self = this;

    var form_contents = {};
    form_contents['dow'] = new Array();
    jQuery.each(jQuery('#data_form').serializeArray(), function(i, field) {
      if (field.name == 'days_off') {
        form_contents['dow'].push(parseInt(field.value));
      } else {
        form_contents[field.name] = field.value;
      }
    });

    self.save_form(form_contents);
  },

  save_form: function(form_contents) {

    var uurl = '/admin/services/save_settings';

    jQuery.ajax({
        url: uurl,
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
            window.location.href = "/admin/services/settings?page=service_settings";
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  },

  delete: function(id) {
    var page = jQuery('#tag').val();

    jQuery.ajax({
        url: '/admin/store/delete',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            window.location.href = "/admin/services/?page=service_items";
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  }
}
