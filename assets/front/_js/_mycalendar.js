$().ready(function() {
  
  // Start calendar
  c = new Calendar({
    ParentID:"month_div",

    BusinessHours: business_hours,

    DaysOfWeek:['MON','TUE','WED','THU','FRI','SAT','SUN'],

    Months:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],

    Format:'dd/mm/yyyy'
  });

  c.showCurrent();
	
	$(document).on('click', '#month', function(){
    c.showCurrent();
  });

  $(document).on('click', '#prev_month', function(){
    c.previousMonth();
  });

  $(document).on('click', '#next_month', function(){
    c.nextMonth();
  });

  $(document).on('click', '#today_month', function(){
    c.thisMonth();
  }); 

});

var Calendar = function(o) {
  //Store div id
  this.divId = o.ParentID;
  // Days of week, starting on Sunday
  this.DaysOfWeek = o.DaysOfWeek;
  // Months, stating on January
  this.Months = o.Months;
	// Business Hours
  this.BusinessHours = o.BusinessHours;

  // Set the current month, year
  var d = new Date();
  this.CurrentMonth = d.getMonth();
  this.CurrentYear = d.getFullYear();

  var f=o.Format;

  if(typeof(f) == 'string') {
    this.f  = f.charAt(0).toUpperCase();
  } else {
    this.f = 'M';
  }

};

// Goes to next month
Calendar.prototype.nextMonth = function() {

  if ( this.CurrentMonth == 11 ) {
    this.CurrentMonth = 0;
    this.CurrentYear = this.CurrentYear + 1;
  } else {
    this.CurrentMonth = this.CurrentMonth + 1;
  }

  this.showCurrent();
};

// Goes to previous month
Calendar.prototype.previousMonth = function() {

  if ( this.CurrentMonth == 0 ) {

    this.CurrentMonth = 11;
    this.CurrentYear = this.CurrentYear - 1;

  } else {

    this.CurrentMonth = this.CurrentMonth - 1;

  }

  this.showCurrent();
};

// 
Calendar.prototype.previousYear = function() {

  this.CurrentYear = this.CurrentYear - 1;

  this.showCurrent();
}

// 
Calendar.prototype.nextYear = function() {
  this.CurrentYear = this.CurrentYear + 1;
  this.showCurrent();
}              

Calendar.prototype.thisMonth = function() {
	var d = new Date();
  this.CurrentMonth = d.getMonth();
  this.CurrentYear = d.getFullYear();
  this.showCurrent();
} 

// Show current month
Calendar.prototype.showCurrent = function() {

	var selected_date_val = $('#selected_date').val();

  if (is_empty(selected_date_val)) {
    selected_date_val = moment().format("YYYY-MM-DD HH:mm:ss");
  }

  var self = this;

  jQuery.ajax({
    url: '/cart/calendar_events',
    type: 'POST',
    dataType: 'json',
    data: {
      'range'       : 'm',
      'date_begin'  : selected_date_val,
      'date_end'    : ''
    },
    beforeSend: function() {
      
    },
    success: function(data) {
      if (data.status == true) {
        var events = data.events;
        self.Calendar(self.CurrentYear, self.CurrentMonth, events);
      } else {
        
      }
    },
    complete : function() {
  	
    }
  });
  
};

// Show month (year, month)
Calendar.prototype.Calendar = function(y,m,events) {
  typeof(y) == 'number' ? this.CurrentYear = y : null;
  typeof(y) == 'number' ? this.CurrentMonth = m : null;

  // 1st day of the selected month
  var firstDayOfCurrentMonth = new Date(y, m, 1).getDay();

  // Last date of the selected month
  var lastDateOfCurrentMonth = new Date(y, m+1, 0).getDate();

  // Last day of the previous month
  var lastDateOfLastMonth = m == 0 ? new Date(y-1, 11, 0).getDate() : new Date(y, m, 0).getDate();

  var html = '<table>';

  // Write the header of the days of the week
  html += '<thead>';
  html += '<tr>';

  for(var i=0; i < 7;i++) {
    html += '<th>' + this.DaysOfWeek[i] + '</th>';
  }

  html += '</tr>';
	html += '</thead>';
	html += '<tbody>';

  var p = dm = this.f == 'M' ? 1 : firstDayOfCurrentMonth == 0 ? -5 : 2;

  var cellvalue;
  
  var biz_hours = this.BusinessHours;

  var m_now = moment();

  var current_year = this.CurrentYear;

  var prev_year = this.CurrentYear - 1;
  var next_year = this.CurrentYear + 1;

  var m_current_month = moment(this.CurrentMonth+1,"M");
  var current_month = m_current_month.format("MM");

  var m_next_month = moment(current_month).add(1, 'months');
  var next_month = m_next_month.format("MM");

  var m_prev_month = moment(current_month).subtract(1, 'months');
  var prev_month = m_prev_month.format("MM");
  
  var m_cal_date = moment(current_year+'-'+current_month);

  for (var d, i=0, z0=0; z0<6; z0++) {
    html += '<tr>';

    for (var z0a = 0; z0a < 7; z0a++) {

      d = i + dm - firstDayOfCurrentMonth;

      // Dates from prev month
      if (d < 1) {
        cellvalue = lastDateOfLastMonth - firstDayOfCurrentMonth + p++;
        var m_date = moment(prev_year + '-' + prev_month + '' + cellvalue,"YYYY-MM-D");
        var day_div_class = day_div(prev_year,prev_month,cellvalue,biz_hours,events.days_off);
        html += '<td class="day nextmonthdates ' + day_div_class +  '" data-moment="'+ m_date.format() +'">' + 
                  '<div class="dayvalue">' + (cellvalue) + '</div>' + 
                  event_time(events,m_date) +
                '</td>';

      // Dates from next month
      } else if ( d > lastDateOfCurrentMonth){
        var p_instance = p++;
        var m_date = moment(current_year + '-' + next_month + '' + p_instance,"YYYY-MM-D");
        var day_div_class = day_div(current_year,next_month,p_instance,biz_hours,events.days_off);
        html += '<td class="day nextmonthdates ' + day_div_class +  '" data-moment="'+ m_date.format() +'">' +
        					'<div class="dayvalue">'+ (p_instance) + '</div>' + 
                  event_time(events,m_date) +
                '</td>';

      // Current month dates
      } else {
        var m_date = moment(current_year + '-' + current_month + '' + d,"YYYY-MM-D");
        var day_div_class = day_div(current_year,current_month,d,biz_hours,events.days_off);

        html += '<td class="day ' + day_div_class +  '" data-moment="'+ m_date.format() +'">' + 
         					'<div class="dayvalue">' + (d) + '</div>' +
                  event_time(events,m_date) +
                '</td>';
        p = 1;
      }
      
      if (i % 7 == 6 && d >= lastDateOfCurrentMonth) {
        z0 = 10; // no more rows
      }

      i++;
    }

    html += '</tr>';
  }

	html += '</tbody>';
  // Closes table
  html += '</table>';

  show_month_buttons();
	$('#cal_date').html(m_cal_date.format("MMM - YYYY"));
  var current_date = moment().format("YYYY-MM-DD HH:mm:ss");
  console.log('calendar: ' + m_cal_date.format());
	$('#selected_date').val(m_cal_date.format());
	$('#'+this.divId).html(html);

};

function show_month_buttons() {
	$('.cal_buttons').hide();
	$('.cal_buttons_month').show();
}

function day_div(year,month,day,biz_hours,days_off) {

	var biz_dow = biz_hours.dow;
	var div_class_array = new Object();
	var m_now = moment();
	var m_date = moment(year + '-' + month + '-' + day,"YYYY-MM-D");

  var is_day_off = days_off.indexOf(m_date.format("YYYY-MM-DD"));
  var before_current_date = moment(m_date.format("YYYY-MM-DD")).isBefore(m_now.format("YYYY-MM-DD"));
	var is_current = m_date.format("YYYY-MM-DD") == m_now.format("YYYY-MM-DD");
	var work_week = biz_dow.indexOf(parseInt(m_date.format("d")));

	if (is_current) {
		div_class_array['current'] = true;
	}

  if (is_day_off >= 0) {
    div_class_array['day_off'] = true;
    div_class_array['inactive'] = true;
  }

	if (before_current_date) {
		div_class_array['past_date'] = true;
    div_class_array['inactive'] = true;
	}

	if (work_week < 0) {
		div_class_array['weekend'] = true;
    div_class_array['inactive'] = true;
	}

  var div_class = '';
  for (var prop in div_class_array) {
    div_class += ' ' + prop;
  }

	return div_class;
}

function event_time(events,m_time) {
  var html = '';
  var events = events.events;
	$.each(events, function( index, event ) {
		var m_event = moment(event.schedule);
		if (m_time.format('YYYY-MM-DD') == m_event.format('YYYY-MM-DD')) {
			html += '<div class="event">- ' + m_event.format('h:mm a') + ' - Reserved</div>';
			return false;
		}
	});

	return html;
}