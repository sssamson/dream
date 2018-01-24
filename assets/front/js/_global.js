'use strict';

$(document).ready(function($){

  $(document).on('click', '.btn-loading', function(){
    var html = $(this).html();
    var self = this;
    var loading = "<i class='fa fa-circle-o-notch fa-spin'></i>";

    if (html.indexOf("<i") >= 0) {
      var text_only = stripHtml(html);
      if (is_empty(text_only)) {
        html_loading = loading;
      } else {
        html_loading = loading + ' ' + text_only;
      }
    } else if (html.indexOf('<span class="fa') >= 0) {
      var text_only =  stripHtml(html);
      html_loading = loading + ' ' + text_only;
    } else {
      html_loading = loading + ' ' + html;
    }

    jQuery($(this)).html(html_loading);

    $(document).on('shown.bs.modal', '.modal', function() {
      jQuery(self).html(html);
    })
  });

  function getJsonFromUrl() {
    var query = location.search.substr(1);
    var result = {};
    query.split("&").forEach(function(part) {
      var item = part.split("=");
      result[item[0]] = decodeURIComponent(item[1]);
    });
    return result;
  }
  
  $("form").submit(function(e){
    e.preventDefault();
  });

});

function before_send(submit_id) {

  var loading = "<i class='fa fa-circle-o-notch fa-spin'></i> Loading";
  jQuery(submit_id).html(loading);
  jQuery(submit_id).prop('disabled', true);
  jQuery('.error').hide();
}

function after_send(submit_id,text) {

  if (typeof text === 'undefined' || is_empty(text)) {
    text = 'Submit';
  }

  jQuery(submit_id).html(text);
  jQuery(submit_id).prop('disabled', false);
}

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
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

function error_modal() {
  jQuery.ajax({
      url: '/error',
      type: 'GET',
      dataType: 'html',
      data : {},
      beforeSend: function() {

      },
      success : function(data) {
        jQuery('.modal-title').html('Organization Audit Logs');
        jQuery('.modal-body').html(data);
      },
      complete : function() {
        jQuery('.ajax-loading').hide();
        jQuery('#modal').modal('show');
      }
  });            
};

function cal_event_add(params) {
  var result = false;
  var biz_dow = params.business_hours.dow;
  var biz_start = params.business_hours.start;
  var biz_end = params.business_hours.end;

  var date = moment(params.start);
  var dow = date.day();

  console.log(params);
  console.log(dow);
  console.log(biz_dow);

  // day of week is in week schedule
  var in_day_of_week = biz_dow.indexOf(dow);
  //console.log(in_day_of_week);
  if (in_day_of_week > -1) {
    //console.log(params.view);
    if (params.view == 'month') {
      result = true;
    } else {
      var start = moment(params.start).format("HH:mm");

      var bizTime_start = moment(biz_start, 'HH:mm');
      var bizTime_end = moment(biz_end, 'HH:mm');
      var myTime = moment(start, 'HH:mm');

      var is_before = bizTime_start.isBefore(myTime);
      var is_after = myTime.isBefore(bizTime_end);

      if (is_before && is_after) {
        result = true;
      }      
    }
  } 

  return result;
}
