<?php
class ME_Controller extends CI_Controller {

  public $page = array();
  
  function __construct()
  {
    parent::__construct();    
    $CI =& get_instance();
    $this->initalize_template();
  }
  
  public function initalize_template()
  {
    // if TRUE template will be used if FALSE template will not be used
    $this->page['use_template'] = TRUE;
    
    $this->page['type'] = 'html';

    // show page header
    $this->page['header'] = TRUE;
    
    // name of template that will be involked
    $this->page['template'] = 'default_html.php';
    
    // if not null error value will be printed on page
    $this->page['error'] = array();
    
    // default title on each page
    $this->page['title'] = 'Admin';
    
    $this->page['is_admin'] = FALSE;
  }
  
  public function _output($output = '') 
  {
    // if use_template set to false just return output
    if ($this->page['use_template'] == FALSE)
    {
        echo $output;
        return TRUE;    
    }

    // if use_template set to false just return output
    if ($this->page['type'] == 'json')
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json'); 
        echo $output;
        return TRUE;    
    }

    // if use_template set to true prepare template
    $this->page['content'] = $output;
    
    if (empty($this->page['template'])) {
      $this->page['template'] = 'default_html.php';
    }

    if (empty($this->page['require_login'])) {
      $this->page['require_login'] = FALSE;
    }
    
    // check session
    if ($this->page['require_login']) {

      if ($this->page['template']=='admin_html.php'){
        if (empty($this->session->admin_id)) {
          redirect('/admin/', 'refresh');
          return TRUE; 
        }
        
        // able to see all event details
        $this->page['is_admin'] = TRUE;

      } else if ($this->page['template']=='account_html.php'){
        if (empty($this->session->user_id)) {
          redirect('/member/', 'refresh');
          return TRUE; 
        }
      }
       
    }
    
    // prepare varabiles for template
    $page = $this->page;
    $page = compact('page');
    echo $this->load->view('templates/'.$this->page['template'],$page,TRUE);
  }

  public function save_file()
  {
    $this->page['template'] = 'default_json.php';

    $type = $this->input->post('type',TRUE);

    if (empty($type)) {
      $type = 'blog';
    }

    $this->load->model('page_model');
    $img_results = $this->page_model->save_image('image',$type);

    if (!empty($img_results['file_name'])) {
      $file_name = $img_results['file_name'];
    } else {
      $upload_error = $img_results;
    }
    
    $return['status'] = TRUE;
    $return['file_name'] = $file_name;

    $this->load->view('elements_default/json', compact('return'));
  }

  public function calendar_events()
  {
    $this->page['template'] = 'default_json.php';
    $range = $this->input->post('range',TRUE);
    $date_begin = $this->input->post('date_begin',TRUE);
    $date_end = $this->input->post('date_end',TRUE);
    $events = $this->service_model->events($range,$date_begin,$date_end);
    $return['events'] = $events;   
    $return['status'] = TRUE;
    $this->load->view('elements_default/json', compact('return'));
  }
}