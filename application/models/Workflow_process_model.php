<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workflow_process_model extends MY_Model {
        
        public $_table = 'workflow_process';
        public $primary_key = 'workflow_processes_id';
        protected $soft_delete = TRUE;
        public $belongs_to = array( 'workflow' );
    
        
}