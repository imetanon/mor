<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Sms extends REST_Controller {
    
    //bug to solve https://github.com/chriskacerguis/codeigniter-restserver/issues/753#issuecomment-273968372
    
    protected $methods = [
            'form_get' => ['level' => 10, 'limit' => 10],
            'index_delete' => ['level' => 10],
            'level_post' => ['level' => 10],
            'regenerate_post' => ['level' => 10],
        ];

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('application_model','application');
        $this->load->model('sms_template_model','sms_template');
        $this->load->model('sms_log_model','sms_log');
    }
    
    
    public function form_get()
    {
        $application_id = $this->get('appid');
        $sms_templates = $this->sms_template->get_many_by('application_id',$application_id);
        $response_message = [
            'status' => TRUE,
            'sms_templates' =>  $sms_templates,
        ];
        $this->response($response_message, REST_Controller::HTTP_OK);
    }

    public function send_post()
    {
        $data = array(
            'sms_log_to' => $this->post('sms_log_to'),
	        'sms_log_message' => $this->post('sms_log_message'),
	        'sms_template_id' => $this->post('sms_template_id'),
	        'application_id' => $this->post('application_id'),
	        'sms_log_status' => TRUE,
	        'sms_log_uuid' => NULL,
	    );
	    
        $sms_log_id = $this->sms_log->insert($data);
        
        if($sms_log_id){
            $response_message = [
                'status' => TRUE,
                'sms_log_id' =>  $sms_log_id,
            ];
        }else{
            $response_message = [
                'status' => FALSE,
                'message' =>  'Insert Sms Log Error',
            ];
        }
        
        $this->response($response_message, REST_Controller::HTTP_OK);
    }

}
