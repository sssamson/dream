$(document).ready(function() {

  var today_date_obj = moment().startOf('day');
  var today_date_str = today_date_obj.format('YYYY-MM-DD');

  $('#calendar').fullCalendar({
    
    header: {
      left: 'prev,next today',
      center: 'title',
      right: ''
    },

    defaultDate: today_date_str,
    navLinks: false, // can click day/week names to navigate views
    selectable: true,
    selectHelper: true,
    
    businessHours: cal_businessHours,

    dayClick: function(date, jsEvent, view) {
      //console.log('Clicked on: ' + date.format());
      //console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
      //console.log('Current view: ' + view.name);
      // change the day's background color just for fun
      //$(this).css('background-color', 'red');
      set_date(date.format());
    },

    editable: true,
    eventLimit: true, // allow "more" link when too many events

    events: function(start, end, timezone, callback) {
      $.ajax({
        url: '/cart/calendar_events',
        dataType: 'json',
        data: {
          start: start.unix(),
          end: end.unix()
        },
        success: function(data) {
          var events = [];
          $.each( data.events, function( index, event ){ 
            events.push(event);
          });
          callback(events);
        }
      });
    }
  });

  set_date = function(date) {

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
          $('#calendar').fullCalendar('refetchEvents');
        } else {
          
        }
      },
      complete : function() {

      }
    });
  }

});