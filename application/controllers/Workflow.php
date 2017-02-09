<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workflow extends MY_Controller {
	
	protected $models = array('application','workflow','workflow_process');
	
	public function index()
	{
		$this->template->add_title_segment("Workflow List");
		$data['workflows'] = $this->workflow->with('application')->get_all();
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
		$this->template->add_js("/assets/js/datatable.mor.js", TRUE);
		$this->template->render("workflow/workflow",$data);
	}
	
	public function show($id = NULL)
	{
		$data['workflow'] = $this->workflow->with('application')->get($id);
		
		$where = array(
            'workflow_id' => $id,
            'workflow_process_step' => 1,
        );
		$data['workflow_process1'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
		
		$where = array(
            'workflow_id' => $id,
            'workflow_process_step' => 2,
        );
		$data['workflow_process2'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
		$data['workflow_process2_due'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_duration : "";
		
		$where = array(
            'workflow_id' => $id,
            'workflow_process_step' => 3,
        );
		$data['workflow_process3'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
		$data['workflow_process3_due'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_duration : "";
		
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
		$this->template->add_js("/assets/js/datatable.mor.js", TRUE);
		$this->template->add_title_segment($data['workflow']->workflow_name);
		$this->template->render("workflow/show",$data);
	}
	
	public function add()
	{
		$this->template->add_title_segment("Add Workflow");
		$data['applications'] = $this->application->get_all();
		$this->template->render("workflow/add",$data);
	}
	
	public function save()
	{
	    $data['applications'] = $this->application->get_all();
	    
	    $this->form_validation->set_rules('inputApplication', 'Application', 'required');
		$this->form_validation->set_rules('inputWorkflowName', 'Workflow Name', 'required');
		$this->form_validation->set_rules('inputDescription', 'Description', 'required');
		$this->form_validation->set_rules('inputStep1', 'Process 1', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->template->render("workflow/add",$data);
	    }
	    else
	    {
            $data = array(
                'workflow_name' => $this->input->post('inputWorkflowName'),
                'workflow_description' => $this->input->post('inputDescription'),
                'application_id' => $this->input->post('inputApplication'),
            );
            if(($workflow_id = $this->workflow->insert($data)) != false){
                $data_step1 = array(
                    'workflow_process_name' => $this->input->post('inputStep1'),
                    'workflow_process_step' => 1,
                    'workflow_id' => $workflow_id,
                );
                $workflow_process_id = $this->workflow_process->insert($data_step1);
                
                $inputStep2 = $this->input->post('inputStep2');
                $inputDue2 = $this->input->post('$inputDue2');
                $inputStep3 = $this->input->post('inputStep3');
                $inputDue3 = $this->input->post('$inputDue3');
                
                if($inputStep2 != NULL){
                    $data_step2 = array(
                        'workflow_process_name' => $inputStep2,
                        'workflow_process_step' => 2,
                        'workflow_process_duration' => $this->input->post('inputDue2'),
                        'workflow_id' => $workflow_id,
                    );
                    $workflow_process_id = $this->workflow_process->insert($data_step2);
                    
                    $data['workflow_process2'] = $this->input->post('inputStep2');
                    $data['workflow_process2_due'] = $this->input->post('inputDue2');
                    
                }else{
                    $data['workflow_process2'] = "";
                    $data['workflow_process2_due'] = "";
                }
                
                if($inputStep3 != NULL){
                    $data_step3 = array(
                        'workflow_process_name' => $this->input->post('inputStep3'),
                        'workflow_process_step' => 3,
                        'workflow_process_duration' => $this->input->post('inputDue3'),
                        'workflow_id' => $workflow_id,
                    );
                    $workflow_process_id = $this->workflow_process->insert($data_step3);
                    $data['workflow_process3'] = $this->input->post('inputStep3');
                    $data['workflow_process3_due'] = $this->input->post('inputDue3');
                }else{
                    $data['workflow_process3'] = "";
                    $data['workflow_process3_due'] = "";
                }
            }
            $data['workflow_process1'] = $this->input->post('inputStep1');
            $data['workflow'] = $this->workflow->with('application')->get($workflow_id);
            $this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
    		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
    		$this->template->add_js("/assets/js/datatable.mor.js", TRUE);
    		$this->template->add_title_segment($data['workflow']->workflow_name);
    		$this->template->render("workflow/show",$data);
	    }
	}
	
	public function edit()
	{
	    $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
		$this->form_validation->set_rules('inputDescription', 'Description', 'required');
        if ($this->form_validation->run() === FALSE)
	    {
	        $data['workflow'] = $this->workflow->with('application')->get($id);
		
    		$where = array(
                'workflow_id' => $id,
                'workflow_process_step' => 1,
            );
    		$data['workflow_process1'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
    		
    		$where = array(
                'workflow_id' => $id,
                'workflow_process_step' => 2,
            );
    		$data['workflow_process2'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
    		$data['workflow_process2_due'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_duration : "";
    		
    		$where = array(
                'workflow_id' => $id,
                'workflow_process_step' => 3,
            );
    		$data['workflow_process3'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
    		$data['workflow_process3_due'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_duration : "";
	        
	        $this->template->render("workflow/show",$data);
	    }else{
	            $data = array( 
    	    	    'workflow_description' => $this->input->post('inputDescription'),
            	);
	            
	            $this->workflow->update($id, $data);
	            
	            $inputStep2 = $this->input->post('inputStep2');
                $inputDue2 = $this->input->post('inputDue2');
                $inputStep3 = $this->input->post('inputStep3');
                $inputDue3 = $this->input->post('inputDue3');

                if($inputStep2 != NULL){
                    $data_step2 = array(
                        'workflow_process_name' => $inputStep2,
                        'workflow_process_step' => 2,
                        'workflow_process_duration' => $inputDue2,
                        'workflow_id' => $id,
                    );
                    
                    $where = array(
                        'workflow_id' => $id,
                        'workflow_process_step' => 2,
                    );
            		if (($process2 = $this->workflow_process->get_by($where))){
            		    $this->workflow_process->update($process2->workflow_process_id,$data_step2);
            		}else{
            		    $workflow_process_id = $this->workflow_process->insert($data_step2);
            		}
                    
                    $data['workflow_process2'] = $this->input->post('inputStep2');
                    $data['workflow_process2_due'] = $this->input->post('inputDue2');
                    
                }else{
                    $data['workflow_process2'] = "";
                    $data['workflow_process2_due'] = "";
                }
                
                if($inputStep3 != NULL){
                    $data_step3 = array(
                        'workflow_process_name' => $inputStep3,
                        'workflow_process_step' => 3,
                        'workflow_process_duration' => $inputDue3,
                        'workflow_id' => $id,
                    );
                    
                    $where = array(
                        'workflow_id' => $id,
                        'workflow_process_step' =>3,
                    );
            		if (($process3 = $this->workflow_process->get_by($where))){
            		    $this->workflow_process->update($process3->workflow_process_id,$data_step3);
            		}else{
            		    $workflow_process_id = $this->workflow_process->insert($data_step3);
            		}
                    
                    $data['workflow_process3'] = $this->input->post('inputStep3');
                    $data['workflow_process3_due'] = $this->input->post('inputDue3');
                }else{
                    $data['workflow_process3'] = "";
                    $data['workflow_process3_due'] = "";
                }
                
                $where = array(
                    'workflow_id' => $id,
                    'workflow_process_step' => 1,
                );
        		$this->session->set_flashdata('success', 'Workflow Updated');
        		$data['workflow_process1'] = ($this->workflow_process->get_by($where)) ? $this->workflow_process->get_by($where)->workflow_process_name : "";
                $data['workflow'] = $this->workflow->with('application')->get($id);
                $this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
        		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
        		$this->template->add_js("/assets/js/datatable.mor.js", TRUE);
        		$this->template->add_title_segment($data['workflow']->workflow_name);
        		$this->template->render("workflow/show",$data);
                
	    }
	}
	
	public function delete()
	{
		
	}
}
