$().ready(function() {
  var hours = new Hours();
});

function Hours() {
  var self = this;
  self.bind_actions();
}

Hours.prototype = {

  bind_actions : function() {
  	var self = this;
  	var cal_type = $('#calendar_type').val();

  	$(document).on('click','#previous_day', function() {
  		self.previous_day();
  	});
		
		$(document).on('click','#next_day', function() {
  		self.next_day();
  	});

		$(document).on('click','#today_day', function() {
  		self.today_day();
  	});

  	$(document).on('click', '.day', function(){
			var is_inactive = $(this).hasClass("inactive");
  		if (!is_inactive && cal_type != 'month') {
	    	var m_day = $(this).attr("data-moment");
	    	$('#selected_date').val(m_day);
	    	$('a[href="#schedule_div"]').tab('show');
	    	self.update_date_title('hour');
	    	self.events();
		  }
		  if(cal_type == 'month') {
		  	var m_day = $(this).attr("data-moment");
      	self.set_day_off_date(m_day);
		  }
	  });

	  $(document).on('click', '.month_tab_link', function(){
  		self.update_date_title('month');
  		show_month_buttons();
  	});

  	$(document).on('click', '.schedule_tab_link', function(){
  		self.update_date_title('hour');
  		self.events();
  	});

		$(document).on('click', '.hour', function(){
			var is_inactive = $(this).hasClass("inactive");
  		if (!is_inactive) {
	  		var id = $(this).attr("data-id");
	  		$("#sel_"+id).prop("checked", true);
	  		$(".selected").hide();
	  		$(".hour").removeClass("hour-selected");
	  		$(".sel_"+id).addClass("hour-selected");
	  		$(".selected_"+id).show();
  		}
  	});
  },

	today_day: function() {
		var self = this;
		var m_today_day = moment();
		$('#selected_date').val(m_today_day.format());
		self.update_date_title('hour');
	  self.events();
  },

  previous_day: function() {
		var self = this;
		var selected_date_val = $('#selected_date').val();
		var m_next_day = moment(selected_date_val).add(-1,'days');
		$('#selected_date').val(m_next_day.format());
		self.update_date_title('hour');
	  self.events();
  },

	next_day: function() {
		var self = this;
		var selected_date_val = $('#selected_date').val();
		var m_next_day = moment(selected_date_val).add(1,'days');
		$('#selected_date').val(m_next_day.format());
		self.update_date_title('hour');
	  self.events();
  },

	show_hour_buttons: function() {
		$('.cal_buttons').hide();
		$('.cal_buttons_hour').show();
	},

  update_date_title: function(type) {
  	var selected_date_val = $('#selected_date').val();

		if (is_empty(selected_date_val)) {
			var m_cal_time = moment();
		} else {
			var m_cal_time = moment(selected_date_val);
		}
		
		if (type=='month') {
			var new_date = m_cal_time.format("MMMM - YYYY");
		} else {	
			var new_date = m_cal_time.format("Do MMMM - YYYY");
		}

		$('#cal_date').html(new_date);
  },

	generate_times: function() {
		var self = this;
		var x = 60; //minutes interval
		var times = []; // time array
		var tt = 0; // start time
		var ap = ['am', 'pm']; // AM-PM

		//loop to increment the time and push results in array
		for (var i=0;tt<24*60; i++) {
		  var hh = Math.floor(tt/60); // getting hours of day in 0-24 format
		  var mm = (tt%60); // getting minutes of the hour in 0-55 format
		  times[i] = ("0" + (hh % 12)).slice(-2) + ':' + ("0" + mm).slice(-2) + ap[Math.floor(hh/12)]; // pushing data in array in [00:00 - 12:00 AM/PM format]
		  tt = tt + x;
		}

		return times;
	},

	events: function() {
		var self = this;
		var selected_date_val = $('#selected_date').val();
    
    if (is_empty(selected_date_val)) {
	    selected_date_val = moment().format("YYYY-MM-DD HH:mm:ss");
	  }

    jQuery.ajax({
      url: '/cart/calendar_events',
      type: 'POST',
      dataType: 'json',
      data: {
	      'range'       : 'd',
	      'date_begin'  : selected_date_val,
	      'date_end'    : ''
	    },
      beforeSend: function() {
        
      },
      success: function(data) {
        if (data.status == true) {
          self.write_times(data.events);
        } else {
          
        }
      },
      complete : function() {

      }
    });
  },

	write_times: function(events) {
		//console.log(events);
		var self = this;
		var html = '';
		var times = self.generate_times();
		//console.log(times);
		html += '<table>';
  	$.each(times, function( index, hour ) {

  		if (hour == '00:00am') {
  			hour = '12:00am';
  		} else if (hour == '00:00pm') {
  			hour = '12:00pm';
  		}

  		// Events and Hours of Operations
  		var has_event = self.event_time(events,hour);
  		var event_name = '';
  		var status = '';
  		if (has_event.found == true) {
				//event_name = has_event.event.title;
				event_name = 'Reserved';
  		}

  		if (has_event.closed == true) {
  			status = 'hidden';
  		}

  		if (has_event.found == true) {
  			status = 'inactive';
  		} 
  		
		  html += '<tr class="hour sel_' + index + ' '+ status +'" data-id="' + index + '">';
		  html += '<td class="time">' + hour + '</td>';
		  html += '<td><div class="hidden selected selected_' + index + '">Selected</div><input class="select d-none" name="time" value="' + hour + '" type="radio" data-id="' + index + '" id="sel_' + index + '">'+ event_name +'</td>';
			html += '</tr>';
		
		});

		html += '</table>';

		$('#schedule_div').html(html);
		self.show_hour_buttons();
	},

	event_time: function (events,time) {
		var result = {
									'found' : false,
									'closed': false
								};

		var m_biz_start = moment(business_hours.start,'HH:mm');
		var m_biz_end = moment(business_hours.end,'HH:mm');
		var m_time = moment(time,'hh:mma');

		var is_before = m_biz_start.isBefore(m_time);
    var is_after = m_time.isBefore(m_biz_end);

    //console.log(m_time);
    //console.log(is_before);
    //console.log(is_after);

    if (is_before == false || is_after == false) {
			result.closed = true;
		}

		$.each(events, function( index, event ) {
			var m_event = moment(event.start);
			if (m_time.format('HH') == m_event.format('HH')) {
				result.event = event;
				result.found = true;
				return false;
			}
		});

		return result;
	},

	set_day_off_date: function(date) {

    jQuery.ajax({
      url: '/admin/services/day_off',
      type: 'POST',
      dataType: 'json',
      data: {
          'date': date
      },
      beforeSend: function() {
        
      },
      success: function(data) {
        if (data.status == true) {
          c.showCurrent();
        } else {
          
        }
      },
      complete : function() {

      }
    });
  }


}