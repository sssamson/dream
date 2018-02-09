$().ready(function() {

  $.validate({
    form : '#contact_form',
    onSuccess : function($form) {
      send_my_email ();
      event.preventDefault();
    }
  });
});

function send_my_email () {

  var message = jQuery('#message').val();
  var name = jQuery('#name').val();
  var email = jQuery('#email').val();
  var phone = jQuery('#phone').val();

  jQuery.ajax({
      url: '/main/send_mail',
      type: 'POST',
      dataType: 'json',
      data: {
        'message':message,
        'name':name,
        'email':email,
        'phone':phone
      },
      beforeSend: function() {

      },
      success: function(data) {
        if (data.status == true) {
          jQuery('.message_response').show();
          jQuery('.contact').val('');
        } else {

        }
      },
      complete : function() {

      }
  });
}

function is_empty(obj) {

  if (typeof obj == 'undefined' || obj === null || obj === '')
    return true;

  if (typeof obj == 'number' && isNaN(obj))
    return true;

  if (obj instanceof Date && isNaN(Number(obj)))
    return true;

  return false;

};
