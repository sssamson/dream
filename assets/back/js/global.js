//Main navigation
$.navigation = $('nav > ul.nav');

$.panelIconOpened = 'icon-arrow-up';
$.panelIconClosed = 'icon-arrow-down';

$.brandPrimary =  '#20a8d8';
$.brandSuccess =  '#4dbd74';
$.brandInfo =     '#63c2de';
$.brandWarning =  '#f8cb00';
$.brandDanger =   '#f86c6b';

$.grayDark =      '#2a2c36';
$.gray =          '#55595c';
$.grayLight =     '#818a91';
$.grayLighter =   '#d1d4d7';
$.grayLightest =  '#f8f9fa';

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

  // popup
  if ( $( ".info" ).length ) {
    $('.info').webuiPopover({animation:'fade',trigger:'hover',width:300});
  }
  // Add class .active to current link
  $.navigation.find('a').each(function(){

    var cUrl = getJsonFromUrl();

    var current_id = $(this).data("url");

    if (current_id==cUrl['page']) {
      $(this).addClass('active');

      $(this).parents('ul').add(this).each(function(){
        $(this).parent().addClass('open');
      });
    }
  });

  // Dropdown Menu
  $.navigation.on('click', 'a', function(e){

    if ($.ajaxLoad) {
      e.preventDefault();
    }

    if ($(this).hasClass('nav-dropdown-toggle')) {
      $(this).parent().toggleClass('open');
      resizeBroadcast();
    }

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

  /* ---------- Main Menu Open/Close, Min/Full ---------- */
  $('.navbar-toggler').click(function(){

    if ($(this).hasClass('sidebar-toggler')) {
      $('body').toggleClass('sidebar-hidden');
      resizeBroadcast();
    }

    if ($(this).hasClass('aside-menu-toggler')) {
      $('body').toggleClass('aside-menu-hidden');
      resizeBroadcast();
    }

    if ($(this).hasClass('mobile-sidebar-toggler')) {
      $('body').toggleClass('sidebar-mobile-show');
      resizeBroadcast();
    }

  });

  $('.sidebar-close').click(function(){
    $('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
  });

  /* ---------- Disable moving to top ---------- */
  $('a[href="#"][data-top!=true]').click(function(e){
    e.preventDefault();
  });

  $('[data-toggle="tooltip"]').tooltip();

  datatable_instance = $('.table').DataTable({
      "oLanguage": {
        "sEmptyTable": "No data available..."
      },
      "order": [[ 0, "asc" ]],
      "responsive": true
  });

  $('.table-min').DataTable({
      "paging":   false,
      "ordering": false,
      "bFilter":  false,
      "info":     false
  });

  $("form").submit(function(e){
    e.preventDefault();
  });

});

$(document).on('click', '.card-actions a', function(e){

  e.preventDefault();

  if ($(this).hasClass('btn-close')) {
    $(this).parent().parent().parent().fadeOut();
  } else if ($(this).hasClass('btn-minimize')) {
    var $target = $(this).parent().parent().next('.card-block');
    if (!$(this).hasClass('collapsed')) {
      $('i',$(this)).removeClass($.panelIconOpened).addClass($.panelIconClosed);
    } else {
      $('i',$(this)).removeClass($.panelIconClosed).addClass($.panelIconOpened);
    }
  } else if ($(this).hasClass('btn-setting')) {
    $('#myModal').modal('show');
  }

});

function resizeBroadcast() {

  var timesRun = 0;
  var interval = setInterval(function(){
    timesRun += 1;
    if(timesRun === 5){
      clearInterval(interval);
    }
    window.dispatchEvent(new Event('resize'));
  }, 62.5);
}

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

is_empty = function(obj) {

  if (typeof obj == 'undefined' || obj === null || obj === '')
    return true;

  if (typeof obj == 'number' && isNaN(obj))
    return true;

  if (obj instanceof Date && isNaN(Number(obj)))
    return true;

  return false;

};


error_modal = function() {
  jQuery.ajax({
      url: '/admin/error',
      type: 'GET',
      dataType: 'json',
      data : {},
      beforeSend: function() {

      },
      success : function(data) {
        jQuery('.modal-title').html('Error');
        jQuery('.modal-body').html(data.message);
      },
      complete : function() {
        jQuery('.ajax-loading').hide();
        jQuery('#modal').modal('show');
      }
  });
};

stripHtml = function(html) {
    // Create a new div element
    var temporalDivElement = document.createElement("div");
    // Set the HTML content with the providen
    temporalDivElement.innerHTML = html;
    // Retrieve the text property of the element (cross-browser support)
    return temporalDivElement.textContent || temporalDivElement.innerText || "";
}

function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}

process_upload = function(form_id, media_id, type) {

  var form = document.getElementById(form_id);
  var fileSelect = document.getElementById(media_id);
  var statusDiv = document.getElementById('indicator_id');

  // Get the files from the input
  var files = fileSelect.files;

  // Create a new FormData object.
  var formData = new FormData();

  //Grab just one file, since we are not allowing multiple file uploads
  var file = files[0];

  //Check the file type
  if (!file.type.match('image.*')) {
      var message = 'This file is not an image. Try again with a valid image.';
      jQuery('#error').html(message);
      return;
  }

   // Add the file to the request.
  formData.append(media_id, file, file.name);
  formData.append('type', type);

  return formData;
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
