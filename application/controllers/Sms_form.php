<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_form extends MY_Controller {
	
	protected $models = array('sms_template','application','sms_log');
	

	
	public function index()
	{
        $data['applications'] = $this->application->get_all();
        $this->template->add_title_segment("SMS Form");
        $this->template->render("sms_form/sms_application",$data);
        	
	}

	public function form()
	{
        
        $appid = $this->input->post('inputApplication');
        
        if (empty($appid))
        {
            show_404();
        }
        
        $url = site_url('api/sms/form/');
        $headers = array('Accept' => 'application/json');
        $parameters = array('MOR-API-KEY' => 'passingkey');
        $response = Unirest\Request::get($url.$appid, $headers, $parameters);
        $data['sms_templates']  = $response->body->sms_templates;
        $data['workflows']  = $response->body->workflows;
        $data['application_id'] = $appid;
        $this->template->add_title_segment("SMS Form");
        $this->template->render("sms_form/sms_form",$data);
	}
	
	public function send()
	{
        $this->form_validation->set_rules('inputTo', 'Telephone Number', 'required');
        $this->form_validation->set_rules('inputMessage', 'Message', 'required');
        $appid = $this->input->post('application_id');
        echo $appid;
        
        if ($this->form_validation->run() === FALSE)
        {
            $url = site_url('api/sms/form/');
            $headers = array('Accept' => 'application/json');
            $parameters = array('MOR-API-KEY' => 'passingkey');
            $response = Unirest\Request::get($url.$appid, $headers, $parameters);
            
            $data['sms_templates']  = $response->body->sms_templates;
            $data['workflows']  = $response->body->workflows;
            $data['application_id'] = $appid;
            $this->template->add_title_segment("SMS Form");
            $this->template->render("sms_form/sms_form",$data);
        }
        else
        {
            $url = site_url('api/sms/send');
            $headers = array('Accept' => 'application/json');
            $query = array(
                'MOR-API-KEY' => 'passingkey',
                'sms_log_to' => $this->input->post('inputTo'),
                'sms_log_message' => $this->input->post('inputMessage'),
                'sms_template_id' => $this->input->post('inputTemplate'),
                'application_id' => $appid
            );
            $response = Unirest\Request::post($url, $headers, $query);
            redirect('/sms-form');
        }
    }

}
