<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends MY_Controller {
	
	protected $models = array('application');
	
	public function index()
	{
		$this->template->add_title_segment("Application List");
		$data['applications'] = $this->application->get_all();
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
		$this->template->render("application/application",$data);
	}
	
	public function show($id = NULL)
	{
		$data['application'] = $this->application->get($id);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
		$this->template->add_title_segment($data['application']->application_name);
		$this->template->render("application/show",$data);
	}
	
	public function add()
	{
		$this->template->add_title_segment("Add Application");
		$this->template->render("application/add");
	}
	
	public function save()
	{
		$this->form_validation->set_rules('inputApplicationName', 'Application Name', 'required');
		$this->form_validation->set_rules('inputDescription', 'Description', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->template->render("application/add");
	    }
	    else
	    {
	    	$data = array(
		        'application_name' => $this->input->post('inputApplicationName'),
		        'application_description' => $this->input->post('inputDescription'),
		    );
		    if(($id = $this->application->insert($data)) != false){
		    	$this->session->set_flashdata('success', 'Application Added');
		    	$data['application'] = $this->application->get($id);
		    	$this->template->add_title_segment($data['application']->application_name);
				$this->template->render("application/show",$data);
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
        
        $data['application'] = $this->application->get($id);
        
		$this->form_validation->set_rules('inputDescription', 'Description', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->template->render("application/show",$data);
        }
        else
        {
        	$data = array( 
        		'application_description' => $this->input->post('inputDescription'),
        	);
            if($this->application->update($id, $data) != false){
            	$this->session->set_flashdata('success', 'Application Updated');
		    	$data['application'] = $this->application->get($id);
		    	$this->template->add_title_segment($data['application']->application_name);
				$this->template->render("application/show",$data);
            }
        }
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		    
	    if (empty($id))
	    {
	        show_404();
	    }
	    
	    if($this->application->delete($id) != false){
	    	redirect('/application');
	    }
	}
}
