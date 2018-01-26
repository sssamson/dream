$().ready(function() {
  var blog = new Blog();
});

function Blog() {
  var self = this;
  self.bind_actions();
}

Blog.prototype = {
  bind_actions : function() {
    var self = this;

    if ( $( "#summernote" ).length ) {
      $('#summernote').summernote({
        height: 500,
        callbacks: {
          onImageUpload: function(files) {
            self.save_image(files[0],'textarea')
          }
        }
      });
    }

    if ( $( "#date" ).length ) {
      $('#date').datepicker({
        format: "yyyy-mm-dd",
        defaultDate: moment().format('YYYY-MM-DD')
      });
    }

    if ( $( "#time" ).length ) {
      $('#time').timepicker();
    }

    if (datatable_instance !== undefined) {
      datatable_instance.order( [ 0, 'desc' ] ).draw();
    }

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
      window.location.href = '/admin/blogs/add?page=blogs';
    });

    // edit button
    $(document).on('click', '.edit', function() {
      var id = jQuery(this).data("id");
      window.location.href = "/admin/blogs/edit?page=blogs&id=" + id;
    });

    // form validator
    $.validate({
      form : '#data_form',
      onSuccess : function($form) {
        var has_media = jQuery('#image').val();
        if (is_empty(has_media)) {
          self.process_form('');
        } else {
          var fileSelect = document.getElementById('image');
          var files = fileSelect.files;
          self.save_image(files[0],'form');
        }
      }
    });
  },

  save_image: function(file,process_type) {
    var self = this;
    var submit_url = '/admin/services/save_file';

    var formData = self.process_upload(file, 'image', 'blog');

    // Set up the AJAX request.
    var xhr = new XMLHttpRequest();

    // Open the connection.
    xhr.open('POST', submit_url, true);

    // Set up a handler for when the request finishes.
    xhr.onload = function () {
      if (xhr.status === 200) {
        var data = $.parseJSON(xhr.response);
        if (!is_empty(data.file_name)) {
          if (process_type == 'form') {
            self.process_form(data.file_name);
          } else if (process_type == 'textarea') {
            var filename = data.file_name;
            var url = '/assets/img/blog/'+filename;
            $('#summernote').summernote('insertImage', url, filename);
          }
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

  process_upload: function(file, media_id, type) {

    // Create a new FormData object.
    var formData = new FormData();

    //Check the file type
    if (!file.type.match('image.*')) {
        var message = 'This file is not an image. Try again with a valid image.';
        jQuery('#error').html(message);
        return;
    }

    // Add the file to the request.
    formData.append(media_id, file, file.name);
    formData.append('type', type);

    return formData;
  },

  process_form: function(img_name) {
    var self = this;

    var form_contents = {};
    jQuery.each(jQuery('#data_form').serializeArray(), function(i, field) {
      if (field.name == 'content') {
        form_contents['content'] = htmlEntities($('#summernote').summernote('code'));
      } else {
        form_contents[field.name] = field.value;
      }
    });

    if (!is_empty(img_name)) {
      form_contents['image'] = img_name;
    }

    self.save_form(form_contents);
  },

  save_form: function(form_contents) {
    jQuery.ajax({
        url: '/admin/blogs/save_blog',
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
            window.location.href = "/admin/blogs/?page=blogs";
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
        url: '/admin/blogs/delete_blog',
        type: 'POST',
        dataType: 'json',
        data: {
          'id': id
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            window.location.href = "/admin/blogs/?page=blogs";
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  }
}
