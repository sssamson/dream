$().ready(function() {
  $(document).on('click', '.contact', function() {
    jQuery('.message_response').hide();
  });
  $(document).on('click', '#send_email', function() {
    var message = jQuery('#message').val();
    var name = jQuery('#name').val();
    var email = jQuery('#email').val();
    var phone = jQuery('#phone').val();
    if (!is_empty(message) && !is_empty(name) && !is_empty(email) && !is_empty(phone)) {
      send_my_email();
    }
  });
});

function send_my_email (name,email,phone,message) {

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
