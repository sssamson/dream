$().ready(function() {
  var order = new Order();
});

function Order() {
  var self = this;
  self.bind_actions();
}

Order.prototype = {
  bind_actions : function() {
    var self = this;

    // view order
    $(document).on('click', '.view_order', function() {
      var id = jQuery(this).data("id");
      window.location.href = '/member/view_order?id='+id;
    });

  }
}
