<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workflow_log_model extends MY_Model {
        
        public $primary_key = 'workflow_log_id';
        protected $soft_delete = TRUE;
        public $belongs_to = array( 'workflow' );

}