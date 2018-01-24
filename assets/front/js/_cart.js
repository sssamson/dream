$().ready(function() {
  var cart = new Cart();
});

function Cart() {
  var self = this;
  self.bind_actions();
}

Cart.prototype = {
  bind_actions : function() {
    var self = this;
    
    // place order button
    $(document).on('click', '.place_order', function() {
      before_send('#form_validate');
      self.place_order();
    });  

    // checkout button
    $(document).on('click', '.checkout', function() {
      window.location.href = '/cart/checkout';
    });

    // service button
    $(document).on('click', '.service_address', function() {
      window.location.href = '/cart/checkout';
    });

    // payment button
    $(document).on('click', '.payment', function() {
      window.location.href = '/cart/payment';
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

    var page = jQuery('#page').val();
    var next_page = '';

    if (page == 'service') {
      next_page = "/cart/address";
    } else if (page == 'address') {
      next_page = "/cart/payment";
    } else if (page == 'payment') {
      next_page = "/cart/review";
    } 
    
    jQuery.ajax({
        url: '/cart/save',
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
            window.location.href = next_page;
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {
          after_send('#form_validate');
        }
    });
  },

  place_order: function() {

    jQuery.ajax({
        url: '/cart/charge',
        type: 'POST',
        dataType: 'json',
        data: {
        },
        beforeSend: function() {

        },
        success: function(data) {
          if (data.status == true) {
            window.location.href = "/cart/cc_results";
          } else {
            window.location.href = "/error";
          }
        },
        complete : function() {

        }
    });
  }
}
