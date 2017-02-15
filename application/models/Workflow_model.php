<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workflow_model extends MY_Model {
        
        public $primary_key = 'workflow_id';
        protected $soft_delete = TRUE;
        public $belongs_to = array( 'application' );
        public $has_many = array( 'workflow_processes');
        
}