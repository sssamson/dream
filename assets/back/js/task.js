$().ready(function() {
  var task = new Task();
});

function Task() {
  var self = this;
  self.bind_actions();
}

Task.prototype = {
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
      window.location.href = '/admin/tasks/add?page=tasks';
    });

    // edit button
    $(document).on('click', '.edit', function() {
      var id = jQuery(this).data("id");
      window.location.href = "/admin/tasks/edit?page=tasks&id=" + id;
    });

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
    jQuery.each(jQuery('#data_form').serializeArray(), function(i, field) {
      form_contents[field.name] = field.value;
    });

    self.save_form(form_contents);
  },

  save_form: function(form_contents) {

    jQuery.ajax({
        url: '/admin/tasks/save_task',
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
            window.location.href = "/admin/tasks?page=tasks";
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

    jQuery.ajax({
        url: '/admin/tasks/delete_task',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            window.location.href = "/admin/tasks?page=tasks";
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  }
}
