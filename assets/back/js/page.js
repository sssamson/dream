$().ready(function() {
  var page = new Page();
});

function Page() {
  var self = this;
  self.bind_actions();
  self.media_type();
}

Page.prototype = {
  bind_actions : function() {
    var self = this;

    $(".select2").select2({
      tags: true
    });

    // media type
    $(document).on('click', '.media_type_radio', function() {
      self.media_type();
    });

    //confirm delete
    $(document).on('click', '.delete_confirm', function() {
      $('#modal_warning').modal('hide');
      var name = jQuery(this).data("id");
      var type = jQuery(this).data("type");
      if (type == 'category') {
        self.delete_category(name);
      } else {
        self.delete(name);
      }
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
      var page = jQuery('#tag').val();
      window.location.href = '/admin/pages/add?page=' + page;
    });

    // edit button
    $(document).on('click', '.edit', function() {
      var id = jQuery(this).data("id");
      var page = jQuery('#tag').val();
      window.location.href = "/admin/pages/edit?id=" + id + '&page=' + page;
    });

    // add category button
    $(document).on('click', '.add_category', function() {
      var page = jQuery('#tag').val();
      window.location.href = '/admin/pages/add_category?page=' + page;
    });

    // edit category button
    $(document).on('click', '.edit_category', function() {
      var id = jQuery(this).data("id");
      var page = jQuery('#tag').val();
      window.location.href = "/admin/pages/edit_category?id=" + id + '&page=' + page;
    });

    // delete category button
    $(document).on('click', '.delete_category', function() {
      var name = jQuery(this).data("id");
      var content = jQuery(this).data("content");
      $('.delete_confirm').data('id', name);
      $('.delete_confirm').data('type', 'category');
      $('.modal_warning-title').html('Confirm Delete');
      $('.modal_warning-body').html(content);
      $('#modal_warning').modal('show');
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

    // category form validator
    $.validate({
      form : '#data_form_category',
      onSuccess : function($form) {
        self.process_form_category();
      }
    });
  },

  save_image: function() {
    
    var self = this;
    var submit_url = '/admin/pages/save_file';

    var formData = process_upload('data_form', 'image', 'page');

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
    var page = jQuery('#tag').val();
    var type = jQuery('#type').val();
    var uurl = '';

    if (type == 'page') {
      uurl = '/admin/pages/save_page';
    } else if (type == 'element') {
      uurl = '/admin/pages/save_element';
    }

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
          console.log(data);
          console.log(page);
          if (data.status == true) {
            window.location.href = "/admin/pages/?page="+page;
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
        url: '/admin/pages/delete_element',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            window.location.href = "/admin/pages/?page="+page;
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  },

  media_type: function() {
    jQuery('.media_div').hide();
    var mediatype = $('input[name=mediatype]:checked').val();
    if (mediatype == 'image') {
      jQuery('#image_div').show();
    } else if (mediatype == 'video') {
      jQuery('#video_div').show();
    } else if (mediatype == 'icon') {
      jQuery('#icon_div').show();
    } else {
      $('#image_type').attr('checked', true);
      jQuery('#image_div').show();
    }
  },

  process_form_category: function() {
    var self = this;

    var form_contents = {};
    jQuery.each(jQuery('#data_form').serializeArray(), function(i, field) {
      form_contents[field.name] = field.value;
    });

    self.save_form_category(form_contents);
  },

  save_form_category: function(form_contents) {
    var page = jQuery('#tag').val();

    jQuery.ajax({
        url: '/admin/pages/save_category',
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
            window.location.href = "/admin/pages/?page="+page;
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  },

  delete_category: function(id) {
    var page = jQuery('#tag').val();

    jQuery.ajax({
        url: '/admin/pages/delete_category',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            window.location.href = "/admin/pages/?page="+page;
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  },
}
