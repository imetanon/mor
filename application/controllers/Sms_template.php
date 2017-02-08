<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_template extends MY_Controller {
	
	protected $models = array('sms_template','application');
	
	public function index()
	{
		$this->template->add_title_segment("SMS-Template List");
		$data['sms_templates'] = $this->sms_template->with('application')->get_all();
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
		$this->template->add_js("/assets/js/datatable.mor.js", TRUE);
		$this->template->render("sms_template/sms_template",$data);
	}
	
	public function show($id = NULL)
	{
		$data['sms_template'] = $this->sms_template->with('application')->get($id);
		$all_template_application = $this->sms_template->get_many_by('application_id', $data['sms_template']->application_id);
		$data['count_position'] = count($all_template_application);
		$this->template->add_title_segment($data['sms_template']->sms_template_name);
		$this->template->render("sms_template/show",$data);
	}
	
	public function add()
	{
		$this->template->add_title_segment("Add SMS-Template");
		$data['applications'] = $this->application->get_all();
		$this->template->render("sms_template/add",$data);
	}
	
	public function save()
	{
		
		$data['applications'] = $this->application->get_all();
		
		$this->form_validation->set_rules('inputApplication', 'Application', 'required');
		// $this->form_validation->set_rules('inputPosition', 'Position', 'required');
		$this->form_validation->set_rules('inputTemplateName', 'Template Name', 'required');
		$this->form_validation->set_rules('inputMessage', 'Message', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->template->render("sms_template/add",$data);
	    }
	    else
	    {
	    	$all_template_application = $this->sms_template->get_many_by('application_id', $this->input->post('inputApplication'));

	    	$data = array(
	    	    'sms_template_name' => $this->input->post('inputTemplateName'),
	    	    // 'sms_template_position' => $this->input->post('inputPosition'),
	    	    'sms_template_position' => count($all_template_application) + 1,
	    	    'sms_template_message' => $this->input->post('inputMessage'),
	    	    'application_id' => $this->input->post('inputApplication'),

		    );
		    if(($id = $this->sms_template->insert($data)) != false){
		    	$this->session->set_flashdata('success', 'Template Added');
        		$data['sms_template'] = $this->sms_template->with('application')->get($id);
        		$all_template_application = $this->sms_template->get_many_by('application_id', $data['sms_template']->application_id);
        		$data['count_position'] = count($all_template_application);
        		$this->template->add_title_segment($data['sms_template']->sms_template_name);
        		$this->template->render("sms_template/show",$data);
		    }
	    }
	}
	
	public function edit()
	{
		$id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $data['sms_template'] = $this->sms_template->with('application')->get($id);
        
		$this->form_validation->set_rules('inputPosition', 'Position', 'required');
		$this->form_validation->set_rules('inputMessage', 'Message', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->template->render("sms_template/show",$data);
        }
        else
        {
        	
        	$current_position = $data['sms_template']->sms_template_position;
        	$new_position = $this->input->post('inputPosition');
        	$sms_templates = $this->sms_template->get_many_by('application_id',$data['sms_template']->application->application_id);
        	
        	if($new_position < $current_position){
				foreach($sms_templates as $template)
				{
					if($template->sms_template_position < $current_position && $template->sms_template_position >= $new_position){
						$data = array();
						$data['sms_template_position'] = $template->sms_template_position + 1;
						$this->sms_template->update($template->sms_template_id, $data);
					}
				}
        	}else if($new_position > $current_position){
        		foreach($sms_templates as $template)
				{
					if($template->sms_template_position <= $new_position && $template->sms_template_position > $current_position){
						$data = array();
						$data['sms_template_position'] = $template->sms_template_position - 1;
						$this->sms_template->update($template->sms_template_id, $data);
					}
				}
        	}
        	
        	$data = array( 
	    	    'sms_template_position' => $this->input->post('inputPosition'),
	    	    'sms_template_message' => $this->input->post('inputMessage'),
        	);
        	

            if($this->sms_template->update($id, $data) != false){
                $this->session->set_flashdata('success', 'Template Updated');
                $data['sms_template'] = $this->sms_template->with('application')->get($id);
                $all_template_application = $this->sms_template->get_many_by('application_id', $data['sms_template']->application_id);
        		$data['count_position'] = count($all_template_application);
                $this->template->add_title_segment($data['sms_template']->sms_template_name);
                $this->template->render("sms_template/show",$data);
            }
        }
	}
	
}
