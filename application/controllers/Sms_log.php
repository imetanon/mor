<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_log extends MY_Controller {
	
	protected $models = array('sms_template','application','sms_log');
	
	public function index()
	{
        $data['sms_logs'] = $this->sms_log->with('application')->get_all();
        $this->template->add_title_segment("All Logs");
        $this->template->add_js("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js", TRUE);
		$this->template->add_js("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js", TRUE);
		$this->template->add_js("/assets/js/datatable.mor.js", TRUE);
        $this->template->render("sms_log/sms_log",$data);
	}


}
