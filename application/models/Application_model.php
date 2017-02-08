<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application_model extends MY_Model {
    
        public $primary_key = 'application_id';
        protected $soft_delete = TRUE;
        public $has_many = array( 'sms_templates' );
        
}