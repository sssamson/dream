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

    //confirm delete
    $(document).on('click', '.delete_confirm', function() {
      $('#modal_warning').modal('hide');
      var name = jQuery(this).data("id");
      self.delete(name);
    });

    // delete button
    $(document).on('click', '.delete', function() {
      var name = jQuery(this).data("id");
      var content = jQuery(this).data("content");
      $('.delete_confirm').data('id', name);
      $('.modal_warning-title').html('Confirm Delete');
      $('.modal_warning-body').html(content);
      $('#modal_warning').modal('show');
    });

    // add button
    $(document).on('click', '.add', function() {
      window.location.href = '/admin/services/add?page=services_types';
    });

    // edit button
    $(document).on('click', '.edit', function() {
      var id = jQuery(this).data("id");
      window.location.href = "/admin/services/edit?page=services_types&id=" + id;
    });

    // form validator
    $.validate({
      form : '#data_form',
      onSuccess : function($form) {
        var has_media = jQuery('#image').val();
        if (is_empty(has_media)) {
          self.process_form('');
        } else {
          self.save_image();
        }
      }
    });
  },

  save_image: function() {
    
    var self = this;
    var submit_url = '/admin/services/save_file';

    var formData = process_upload('data_form', 'image', 'store');

    // Set up the AJAX request.
    var xhr = new XMLHttpRequest();

    // Open the connection.
    xhr.open('POST', submit_url, true);

    // Set up a handler for when the request finishes.
    xhr.onload = function () {
      if (xhr.status === 200) {
        var data = $.parseJSON(xhr.response);
        if (!is_empty(data.file_name)) {
          self.process_form(data.file_name);
        } else {
          var message = 'An error occurred while uploading the file. Try again';  
          jQuery('#error').html(message);
        }
      } else {
        var message = 'An error occurred while uploading the file. Try again';  
          jQuery('#error').html(message);
      }
    };

    // Send the Data.
    xhr.send(formData);
  },

  process_form: function(img_name) {
    var self = this;

    var form_contents = {};
    jQuery.each(jQuery('#data_form').serializeArray(), function(i, field) {
      form_contents[field.name] = field.value;
    });

    if (!is_empty(img_name)) {
      form_contents['image'] = img_name;
    }

    self.save_form(form_contents);
  },

  save_form: function(form_contents) {

    var uurl = '/admin/store/save_product';

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
            window.location.href = "/admin/services/?page=services_types";
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
