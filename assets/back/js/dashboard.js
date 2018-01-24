$().ready(function() {
	var dashboard = new Dashboard();
});

function Dashboard() {
	var self = this;
	self.bind_actions();
}

Dashboard.prototype = {
	bind_actions : function() {
		var self = this;

		//confirm delete
    $(document).on('click', '.delete_confirm', function() {
      $('#modal_warning').modal('hide');
      var name = jQuery(this).data("id");
      self.delete(name);
    });

	}
}
