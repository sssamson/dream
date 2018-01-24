$().ready(function() {
  var store = new Store();
});

function Store() {
  var self = this;
  self.bind_actions();
}

Store.prototype = {
  bind_actions : function() {
    var self = this;
    
    if (datatable_instance !== undefined) {
      datatable_instance.order( [ 0, 'desc' ] ).draw();
    }

    // update-status
    $(document).on('click', '.update_status', function() {
      var id = jQuery(this).data("id");
      var status = $('#status').val();
      self.update_status(id,status);    
    });

    // edit order
    $(document).on('click', '.view_order', function() {
      var id = jQuery(this).data("id");
      window.location.href = "/admin/store/edit_order/?page=orders&id="+id;   
    });

    // order delete button
    $(document).on('click', '.order_delete', function() {
      var name = jQuery(this).data("id");
      var content = jQuery(this).data("content");
      $('.delete_confirm').data('id', name);
      $('.delete_confirm').data('type', 'order');
      $('.modal_warning-title').html('Confirm Delete');
      $('.modal_warning-body').html(content);
      $('#modal_warning').modal('show');
    });

    //confirm delete
    $(document).on('click', '.delete_confirm', function() {
      $('#modal_warning').modal('hide');
      var name = jQuery(this).data("id");
      var type = jQuery(this).data("type");
      self.delete(name,type);
    });

    // product delete button
    $(document).on('click', '.delete', function() {
      var name = jQuery(this).data("id");
      var content = jQuery(this).data("content");
      $('.delete_confirm').data('id', name);
      $('.delete_confirm').data('type', 'product');
      $('.modal_warning-title').html('Confirm Delete');
      $('.modal_warning-body').html(content);
      $('#modal_warning').modal('show');
    });

    // add button
    $(document).on('click', '.add', function() {
      window.location.href = '/admin/store/add?page=products';
    });

    // edit button
    $(document).on('click', '.edit', function() {
      var id = jQuery(this).data("id");
      window.location.href = "/admin/store/edit?page=products&id=" + id;
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
  
  update_status: function(id,status) {
    
    jQuery.ajax({
        url: '/admin/store/update_status',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id,
            'status': status
        },
        beforeSend: function() {

        },
        success: function(data) {
          window.location.href = "/admin/store/orders/?page=orders";
        },
        complete : function() {

        }
    });
  },

  view_order: function(id) {
    var self = this;
        
    jQuery.ajax({
        url: '/admin/store/view_order',
        type: 'POST',
        dataType: 'html',
        data : {
          'id': id
        },
        beforeSend: function() {
            jQuery('.global-error').hide();
            jQuery('.ajax-loading').show();
        },
        success : function(data) {
            jQuery('.modal-title').html('Order View');
            jQuery('.modal-body').html(data);
        },
        complete : function() {
            jQuery('.ajax-loading').hide();
            jQuery('#modal').modal('show');
        }
    });            
  },

  save_image: function() {
    
    var self = this;
    var submit_url = '/admin/store/save_file';

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
            window.location.href = "/admin/store/?page=products";
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  },

  delete: function(id,type) {

    jQuery.ajax({
        url: '/admin/store/delete',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id,
            'type': type
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            if (type == 'product') {
              window.location.href = "/admin/store/?page=products";
            } else {
              window.location.href = "/admin/store/orders/?page=orders";
            }
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  }
}
