<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calendar extends ME_Controller
{
    
  function __construct()
  {
    parent::__construct();
    $this->load->model('service_model');
    $this->page['template'] = 'default_html.php';
    $this->page['js'][] = '/front/js/_mycalendar';
    $this->page['js'][] = '/front/js/_myhours';
    $this->page['css'][] = '/front/css/_mycalendar';
  }
  
  public function index()
  {
    $params['business_hours'] = $this->service_model->business_hours();
    $this->load->view("cart/calendar",$params);
  }
}